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
        // test method type
        $method = $request->method();
        
        // Cookie name
        $cookieName = config('session.cookie');

        // Session id
        $cookieID = session()->getId();

        // Input name "type"
        $type = $request->input('type');

        // test input name "type"
        Storage::append('/public/uploads/test/input-type.txt', 'method=' . $method . ' ' . $type);

        // Загрузка товаров и предложений из 1С на сайт
        if ($type == 'catalog') {

            $input_mode = $request->input('mode');

            // test input "mode"
            Storage::append('/public/uploads/test/input-mode.txt', 'method=' . $method . ' ' . $input_mode);

            $uploads_folder = public_path('storage/uploads/1c_catalog');

            if ($input_mode == 'checkauth') {

                // HTTP auth
                $user = $request->header('PHP_AUTH_USER'); // Admin
                $pass = $request->header('PHP_AUTH_PW'); // secret123
                
                /**
                 * Аутентификация пользователя по имени и паролю. Модель App\Models\User
                 * Если аутентификация пройдена, то возвращаю строку "success\n$cookieName\n$cookieID\n"
                 * Иначе возвращаю строку "failure\n"
                 */
                if (Auth::attempt(['name' => $user, 'password' => $pass])) {

                    // Truncate table exchange_sessions
                    \App\Models\ExchangeSession::truncate();

                    // Make model ExchangeSession
                    \App\Models\ExchangeSession::create([
                        'cookie_name' => $cookieName,
                        'session_id' => $cookieID
                    ]);

                    // test auth
                    Storage::append('/public/uploads/test/test-auth-all-ok.txt', 'all ok');

                    return "success\n$cookieName\n$cookieID\n";

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
                Storage::append('/public/uploads/test/catalog-init.txt', 'method=' . $method . ' ' . 'type=catalog mode=init ' . "cookie=" . $cookie);

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
                Storage::append('/public/uploads/test/catalog-file.txt', 'method=' . $method . ' ' . 'type=catalog mode=file ' . $filename);

                return "success\n";

            } elseif ($input_mode == 'import') {  // import to 1c

                $filename = $request->input('filename');

                // test header
                if ($request->hasHeader('cookie')) {
                    Storage::append('/public/uploads/test/catalog-import-auth-header.txt', $request->header('cookie'));
                }

                // test
                Storage::append('/public/uploads/test/catalog-import.txt', 'method=' . $method . ' ' . 'mode=import filename is ' . $filename);
                
                // Если имя файла 'import.xml', то парсинг
                if ($filename === 'import.xml') {
                    (new \App\Services\ParseXml())->parse();
                }

                return "success\n";
            }

        // Обмен заказами. Выгрузка заказов из сайта в 1С
        } elseif ($type == 'sale') {
            ############################# sale mode ##################################

            // test
            Storage::append('/public/uploads/test/sale.txt', 'type=sale');

            $input_mode = $request->input('mode');
            $uploads_folder = public_path('storage/uploads/1c_exchange/');
            if ($input_mode == 'checkauth') {
                //Not possible to return plaintext session cookie because Laravel encrypts them right before sending

                $user = $_SERVER['PHP_AUTH_USER'];
                $pass = $_SERVER['PHP_AUTH_PW'];

                // test
                Storage::append('/public/uploads/test/sale-checkauth.txt', 'type=sale' . $user . " " . $pass);

                if (Auth::attempt(['name' => $user, 'password' => $pass])) {
                    // return response("success\n$cookieName\n$cookieID\n$csrf\n$date")
                    //     ->header("Content-Type" ,"text/plane; charset=UTF-8");
                    return response("success\n$cookieName\n$cookieID\n")
                        ->header("Content-Type" ,"text/plane; charset=UTF-8");
                } else {
                    abort(403, 'Unauthorized action.');
                }

                // return "success\nnil\nnil";

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
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
