<?php

namespace App\Services;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Auth;
use ZipArchive;
// use XMLReader;
// use SimpleXMLElement;

class Exchange
{
    protected $request;

    /**
     * @param Illuminate\Http\Request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Обмен с 1С
     * Документация https://its.1c.ru/db/metod8dev/content/3314/hdoc
     * Только загрузка товаров и предложений из 1С на сайт
     * Выгрузка заказов из сайта в 1С в файле app\http\controllers\ExchangeController_with_salemode.php
     * @param
     * @return mixed
     */
    public function exchange_1c(): mixed
    {
        // Input name "type"
        $type = $this->request->input('type');

        if ($type == 'catalog') { // Загрузка товаров и предложений из 1С на сайт

            $input_mode = $this->request->input('mode');

            if ($input_mode == 'checkauth') { // Аутентификация пользователя, запрос имени сессии и id сессии

                // HTTP basic auth
                if ($this->request->headers->has('PHP_AUTH_USER')) {
                    $user = $this->request->header('PHP_AUTH_USER'); // Admin
                } else {
                    return "failure";
                }
                
                if ($this->request->headers->has('PHP_AUTH_PW')) {
                    $pass = $this->request->header('PHP_AUTH_PW'); // secret123
                } else {
                    return "failure";
                }

                // Cookie name
                $cookieName = config('session.cookie');

                // Session id
                $sessionID = session()->getId();
                
                /**
                 * Аутентификация пользователя по имени и паролю. Модель App\Models\User
                 * Если аутентификация пройдена, то возвращаю строку "success\n$cookieName\n$sessionID\n"
                 * Иначе возвращаю строку "failure"
                 */
                if (Auth::attempt(['name' => $user, 'password' => $pass])) {

                    // Удаление всех записей из таблицы exchange_sessions
                    \App\Models\ExchangeSession::truncate();

                    // Создание новой записи в таблице exchange_sessions
                    \App\Models\ExchangeSession::create([
                        'cookie_name' => $cookieName,
                        'session_id' => $sessionID
                    ]);

                    return "success\n$cookieName\n$sessionID\n";

                } else {
                    return "failure";
                }

            } elseif ($input_mode == 'init') { // Запрос параметров

                // Проверка имени сессии и id сессии
                if (!$this->session()) {
                    return "failure";
                }

                // Удаление старых файлов обмена
                // Получение всех файлов в папке 1c_catalog
                $files_1c_catalog = Storage::files('/public/uploads/1c_catalog/');

                // Удаление файлов из папки 1c_catalog
                Storage::delete($files_1c_catalog);

                // Получение всех файлов в папке 1c_catalog/tmp
                $files_1c_catalog_tmp = Storage::files('/public/uploads/1c_catalog/tmp/');

                // Удаление файлов из папки 1c_catalog/tmp
                Storage::delete($files_1c_catalog_tmp);

                // return "zip=no\nfile_limit=4000000";
                return "zip=yes\nfile_limit=4000000";
                
            } elseif ($input_mode == 'file') {  // Пошаговая загрузка каталога

                // Проверка имени сессии и id сессии
                if (!$this->session()) {
                    return "failure";
                }

                $filename = $this->request->input('filename');

                $file_content = $this->request->getContent();
                // $file_content = file_get_contents('php://input');

                // Storage::put('/public/uploads/1c_catalog/' . $filename, $file_content); // Вставить в файл
                Storage::append('/public/uploads/1c_catalog/' . $filename, $file_content); // Добавить в файл к текущему содержимому

                return "success\n";

            } elseif ($input_mode == 'import') {  // Парсинг xml файла

                // Проверка имени сессии и id сессии
                if (!$this->session()) {
                    return "failure";
                }

                $filename = $this->request->input('filename');
                
                // Если имя файла 'import.xml', то парсинг
                if ($filename === 'import.xml') {

                    // Распаковка архива
                    // Получаю все файлы из папки tmp
                    $files = Storage::files('/public/uploads/1c_catalog/tmp');

                    // Получаю название единственного файла
                    $file = $files[0];

                    // Создание экземпляра объекта
                    $zip = new ZipArchive();

                    // Открыть архив $zip->open
                    $zipFile = $zip->open(Storage::path($file));

                    // Если архив открылся
                    if ($zipFile === TRUE) {

                        // Распаковка $zip->extractTo
                        $zip->extractTo(Storage::path('/public/uploads/1c_catalog'));

                        $zip->close();

                    } else {
                        return "failure";
                    }

                    // Парсинг
                    (new \App\Services\ParseXml())->parse();
                }

                return "success\n";
            }
        
        } else { // Иначе ошибка 500
            abort(500, 'Internal Server Error');
        }
    }

    /**
     * Проверка запроса на наличие header('cookie') и сравнение с App\Models\ExchangeSession
     * @param
     * @return bool
     */
    public function session(): bool
    {
        if ($this->request->headers->has('cookie')) {

            // Получаю header('cookie')
            // Строка вида 'gidravliccom_session=IyUmT1S6odcjgosz0HbtMgBI2LGASyAYF0bCdLbu'
            $cookie = $this->request->header('cookie');
            
            // Получаю модель App\Models\ExchangeSession
            $exchange_session = \App\Models\ExchangeSession::find(1);

            // Формирую строку
            $session = $exchange_session->cookie_name . '=' . $exchange_session->session_id;

            if ($cookie == $session) {
                return true;
            }

            return false;
        }

        return false;
    }
}