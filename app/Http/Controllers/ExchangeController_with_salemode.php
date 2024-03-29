<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    /**
     * Parse XML to database
     * @param
     * @return bool
     */
    public function parse_xml_db()
    {
        return (new \App\Services\ParseXml())->parse();
    }

    /**
     * 1C_exchange
     * Документация https://its.1c.ru/db/metod8dev/content/3314/hdoc
     * @param Illuminate\Http\Request
     * @return mixed
     */
    public function exchange(Request $request)
    {
        // Input name "type"
        $type = $request->input('type');

        if ($type == 'catalog') { // Загрузка товаров и предложений из 1С на сайт

            $input_mode = $request->input('mode');

            // test input "mode"
            // Storage::append('/public/uploads/test/input-mode.txt', 'method=' . $method . ' ' . $input_mode);

            $uploads_folder = public_path('storage/uploads/1c_catalog');

            if ($input_mode == 'checkauth') {

                // HTTP basic auth
                if ($request->headers->has('PHP_AUTH_USER')) {
                    $user = $request->header('PHP_AUTH_USER'); // Admin
                } else {
                    return "failure";
                }
                
                if ($request->headers->has('PHP_AUTH_PW')) {
                    $pass = $request->header('PHP_AUTH_PW'); // secret123
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

            } elseif ($input_mode == 'init') {

                // test
                $cookie = '';

                /*
                if ($request->headers->has('cookie')) {
                    $cookie = $request->header('cookie');

                    // $cookie строка вида 'gidravliccom_session=IyUmT1S6odcjgosz0HbtMgBI2LGASyAYF0bCdLbu'
                    $exchange_session = \App\Models\ExchangeSession::find(1);

                    $session = $exchange_session->cookie_name . '=' . $exchange_session->session_id;

                    if ($cookie != $session) {
                        return "failure";
                    }
                }
                */

                /*
                if (!(new \App\Services\ExchangeSession($request))->check()) {
                    return "failure";
                }
                */

                // Удаление старых файлов обмена
                // Получение всех файлов в папке
                $files = Storage::files('/public/uploads/1c_catalog/');

                // Удаление файлов
                Storage::delete($files);
                
                // test значение cookie
                // Storage::append('/public/uploads/test/catalog-init.txt', 'method=' . $method . ' ' . 'type=catalog mode=init ' . "cookie=" . $cookie);

                return "zip=no\nfile_limit=4000000";
                
            } elseif ($input_mode == 'file') {

                $filename = $request->input('filename');

                // test header
                if ($request->hasHeader('cookie')) {
                    Storage::append('/public/uploads/test/catalog-file-auth-header.txt', $request->header('cookie'));
                }

                // $file_content = $request->getContent()
                $file_content = file_get_contents('php://input');

                // Storage::put('/public/uploads/1c_catalog/' . $filename, $file_content); // Вставить в файл
                Storage::append('/public/uploads/1c_catalog/' . $filename, $file_content); // Добавить в файл к текущему содержимому

                // test
                // Storage::append('/public/uploads/test/catalog-file.txt', 'method=' . $method . ' ' . 'type=catalog mode=file ' . $filename);

                return "success\n";

            } elseif ($input_mode == 'import') {  // import to 1c

                $filename = $request->input('filename');

                // test header
                if ($request->hasHeader('cookie')) {
                    Storage::append('/public/uploads/test/catalog-import-auth-header.txt', $request->header('cookie'));
                }

                // test
                // Storage::append('/public/uploads/test/catalog-import.txt', 'method=' . $method . ' ' . 'mode=import filename is ' . $filename);
                
                // Если имя файла 'import.xml', то парсинг
                if ($filename === 'import.xml') {
                    (new \App\Services\ParseXml())->parse();
                }

                return "success\n";
            }

        
        } elseif ($type == 'sale') { // Обмен заказами. Выгрузка заказов из сайта в 1С
            ############################# sale mode ##################################

            // test
            Storage::append('/public/uploads/test/sale.txt', 'type=sale');

            $input_mode = $request->input('mode');
            $uploads_folder = public_path('storage/uploads/1c_exchange/');

            if ($input_mode == 'checkauth') {
                
                // HTTP basic auth
                if ($request->headers->has('PHP_AUTH_USER')) {
                    $user = $request->header('PHP_AUTH_USER'); // Admin
                } else {
                    return "failure";
                }

                if ($request->headers->has('PHP_AUTH_PW')) {
                    $pass = $request->header('PHP_AUTH_PW'); // secret123
                } else {
                    return "failure";
                }

                // Cookie name
                $cookieName = config('session.cookie');

                // Session id
                $sessionID = session()->getId();

                // test
                Storage::append('/public/uploads/test/sale-checkauth.txt', 'type=sale' . $user . " " . $pass);

                if (Auth::attempt(['name' => $user, 'password' => $pass])) {
                    return "success\n$cookieName\n$sessionID\n";
                } else {
                    abort(403, 'Unauthorized action.');
                }

            } elseif ($input_mode == 'init') {
                // File::deleteDirectory($uploads_folder, true);

                // test
                Storage::append('/public/uploads/test/sale-init.txt', 'type=sale');

                // Получение всех файлов в папке
                // $files = Storage::files('/public/uploads/1c_exchange/');

                // Удаление файлов
                // Storage::delete($files);

                // Удаление всех файлов из папки
                $this->delete_files($uploads_folder);
    
                //Not zipping makes a pair of files that are over 50 times larger
                return "zip=no\nfile_limit=10000";

            } elseif ($input_mode == 'query') {

                // test
                Storage::append('/public/uploads/test/sale-query.txt', 'type=sale');

                // $file_path = Storage::files($uploads_folder)[0];
                if (count(File::files($uploads_folder)) > 0) {

                    $file_path = File::files($uploads_folder)[0];
                    // dd(storage_path('public/uploads/1c_exchange/'));
                    Log::info('Filename is ' . $file_path);
                    if (strpos($file_path, 'xml') !== false) {
                        $export_xml = file_get_contents($file_path."from.xml");
                        $comer = simplexml_load_string($export_xml);
                        $_POST['xmlfile'] = $comer;
                        return "success\n";

                    } else {
                        Log::info("couldn't unzip");
                        return 'failure\n';
                    }
                }
            }
            elseif ($input_mode == 'file') {

                // test
                Storage::append('/public/uploads/test/sale-file.txt', 'type=sale');

                Storage::append('/public/uploads/1c_exchange/' . $request->input('filename'), $request->instance()->getContent());

                return "success\n";
            }
            
            ############################# sale mode ##################################
        } else { // Иначе ошибка 403
            abort(403, 'Unauthorized action.');
        }
    }
}
