<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Auth;
use ZipArchive;
use XMLReader;
use SimpleXMLElement;

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
     * @param
     * @return mixed
     */
    public function exchange_1c(): mixed
    {
        // Cookie name
        $cookieName = config('session.cookie');

        // Session id
        $cookieID = session()->getId();

        // Загрузка товаров и предложений из 1С на сайт
        if ($this->request->input('type') == 'catalog') {

            // test
            Storage::append('/public/uploads/test/catalog.txt', 'type=catalog');

            $input_mode = $this->request->input('mode');

            $uploads_folder = public_path('storage/uploads/1c_catalog');

            if ($input_mode == 'checkauth') {

                // http auth
                $user = $this->request->header('PHP_AUTH_USER');
                $pass = $this->request->header('PHP_AUTH_PW');

                // test
                Storage::append('/public/uploads/test/catalog-checkauth.txt', 'type=catalog' . $user . " " . $pass);

                if (Auth::attempt(['name' => $user, 'password' => $pass])) {

                    // test
                    Storage::append('/public/uploads/test/catalog-checkauth-auth.txt', 'auth-attempt=yes');

                    return response("success\n$cookieName\n$cookieID\n")
                        ->header("Content-Type" ,"text/plane; charset=UTF-8");
                } else {
                    abort(403, 'Unauthorized action.');
                }

            } elseif ($input_mode == 'init') {

                // test
                Storage::append('/public/uploads/test/catalog-init.txt', 'type=catalog' . " " . $this->request->has('sessid'));
                Storage::append('/public/uploads/test/catalog-init-headers.txt', 'type=catalog' . " " . json_encode($this->request->header()));

                // Удаление всех файлов из папки
                $this->delete_files('/public/uploads/1c_catalog/');

                // Not zipping makes a pair of files that are over 50 times larger
                return "zip=no\nfile_limit=10000";
                
            } elseif ($input_mode == 'file') {

                $filename = $this->request->get('filename');

                $file_content = file_get_contents('php://input');

                Storage::append('/public/uploads/1c_catalog/' . $filename, $file_content); // Добавить в файл к текущему содержимому

                // test
                Storage::append('/public/uploads/test/catalog-file.txt', 'type=catalog' . $filename . " " . $file_content);

                return "success\n";

            } elseif ($input_mode == 'import') {  // import to 1c

                /*
                $uploads_folder = public_path('storage/uploads/1c_catalog');
                $start_time = microtime(true);
                $max_exec_time = 30;
                */

                // test
                Storage::append('/public/uploads/test/catalog-import.txt', 'mode=import filename is' . $this->request->input('filename'));

                /*
                $filename = $this->request->input('filename');
    
                if($filename === 'import.xml') {
                    // Категории и свойства (только в первом запросе пакетной передачи)
                    if(!isset($_SESSION['last_1c_imported_product_num']))
                    {
                        $z = new XMLReader;
                        $z->open($uploads_folder . $filename);		
                        while ($z->read() && $z->name !== 'Классификатор');
                        $xml = new SimpleXMLElement($z->readOuterXML());
                        $z->close();
                        // $this->import_categories($xml);
                        // $this->import_features($xml);
                    }
                    
                    // Товары 			
                    $z = new XMLReader;
                    $z->open($uploads_folder . $filename);
                    
                    while ($z->read() && $z->name !== 'Товар');
                    
                    // Последний товар, на котором остановились
                    $last_product_num = 0;
                    if(isset($_SESSION['last_1c_imported_product_num']))
                        $last_product_num = $_SESSION['last_1c_imported_product_num'];
                    
                    // Номер текущего товара
                    $current_product_num = 0;
            
                    while($z->name === 'Товар') {
                        if($current_product_num >= $last_product_num)
                        {
                            $xml = new SimpleXMLElement($z->readOuterXML());
            
                            // Товары
                            // $this->import_product($xml);
                            
                            $exec_time = microtime(true) - $start_time;
                            if($exec_time+1>=$max_exec_time)
                            {
                                header ( "Content-type: text/xml; charset=utf-8" );
                                print "\xEF\xBB\xBF";
                                print "progress\r\n";
                                print "Выгружено товаров: $current_product_num\r\n";
                                $_SESSION['last_1c_imported_product_num'] = $current_product_num;
                                exit();
                            }
                        }
                        $z->next('Товар');
                        $current_product_num ++;
                    }
                    $z->close();
                    print "success";
                    //unlink($dir.$filename);
                    unset($_SESSION['last_1c_imported_product_num']);
                            
                } elseif($filename === 'offers.xml') {
                    // Варианты			
                    $z = new XMLReader;
                    $z->open($uploads_folder . $filename);
                    
                    while ($z->read() && $z->name !== 'Предложение');
                    
                    // Последний вариант, на котором остановились
                    $last_variant_num = 0;
                    if(isset($_SESSION['last_1c_imported_variant_num']))
                        $last_variant_num = $_SESSION['last_1c_imported_variant_num'];
                    
                    // Номер текущего товара
                    $current_variant_num = 0;
            
                    while($z->name === 'Предложение')
                    {
                        if($current_variant_num >= $last_variant_num)
                        {
                            $xml = new SimpleXMLElement($z->readOuterXML());
                            // Варианты
                            // $this->import_variant($xml);
                            
                            $exec_time = microtime(true) - $start_time;
                            if($exec_time+1>=$max_exec_time) {
                                header ( "Content-type: text/xml; charset=utf-8" );
                                print "\xEF\xBB\xBF";
                                print "progress\r\n";
                                print "Выгружено ценовых предложений: $current_variant_num\r\n";
                                $_SESSION['last_1c_imported_variant_num'] = $current_variant_num;
                                exit();
                            }
                        }
                        $z->next('Предложение');
                        $current_variant_num ++;
                    }
                    $z->close();
                    print "success";
                    //unlink($dir.$filename);
                    unset($_SESSION['last_1c_imported_variant_num']);				
                }
                */


                // Parsing XML
                // Создаю задачу на парсинг
                dispatch(new \App\Jobs\ParseXmlJob());

                Log::info("importing " . $this->request->input('filename'));

                // test
                Storage::append('/public/uploads/test/catalog-import.txt', 'type=catalog' . " " . $this->request->input('filename'));

                return "success\n";
            }

        // Обмен заказами. Выгрузка заказов из сайта в 1С
        } elseif ($this->request->input('type') == 'sale') {
            ############################# sale mode ##################################

            // test
            Storage::append('/public/uploads/test/sale.txt', 'type=sale');

            $input_mode = $this->request->input('mode');
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

                Storage::append('/public/uploads/1c_exchange/' . $this->request->input('filename'), $this->request->instance()->getContent());

                return "success\n";
            }
            
            ############################# sale mode ##################################
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Удаление всех файлов из папки
     * @param string Путь к папке
     * @return void
     */
    public function delete_files($folder): void {
        // Получение всех файлов в папке
        $files = Storage::files($folder);

        // Удаление файлов
        Storage::delete($files);
    }

    /*
    public function import_categories($xml, $parent_id = 0)
    {
        if(isset($xml->Группы->Группа)) {
            foreach ($xml->Группы->Группа as $xml_group)
            {
                $simpla->db->query('SELECT id FROM __categories WHERE external_id=?', $xml_group->Ид);
                $category_id = $simpla->db->result('id');
                if(empty($category_id))
                    $category_id = $simpla->categories->add_category(array('parent_id'=>$parent_id, 'external_id'=>$xml_group->Ид, 'url'=>translit($xml_group->Наименование), 'name'=>$xml_group->Наименование, 'meta_title'=>$xml_group->Наименование, 'meta_keywords'=>$xml_group->Наименование, 'meta_description'=>$xml_group->Наименование ));
                $_SESSION['categories_mapping'][strval($xml_group->Ид)] = $category_id;
                import_categories($xml_group, $category_id);
            }
        }
    }

    public function import_features($xml)
    {
        global $simpla;
        global $dir;
        global $brand_option_name;
        
        $property = array();
        if(isset($xml->Свойства->СвойствоНоменклатуры))
            $property = $xml->Свойства->СвойствоНоменклатуры;
            
        if(isset($xml->Свойства->Свойство))
            $property = $xml->Свойства->Свойство;
            
        foreach ($property as $xml_feature)
        {
            // Если свойство содержит производителя товаров
            if($xml_feature->Наименование == $brand_option_name)
            {
                // Запомним в сессии Ид свойства с производителем
                $_SESSION['brand_option_id'] = strval($xml_feature->Ид);		
            }
            // Иначе обрабатываем как обычной свойство товара
            else
            {
                $simpla->db->query('SELECT id FROM __features WHERE name=?', strval($xml_feature->Наименование));
                $feature_id = $simpla->db->result('id');
                if(empty($feature_id))
                    $feature_id = $simpla->features->add_feature(array('name'=>strval($xml_feature->Наименование)));
                $_SESSION['features_mapping'][strval($xml_feature->Ид)] = $feature_id;
                if($xml_feature->ТипЗначений == 'Справочник')
                {
                    foreach($xml_feature->ВариантыЗначений->Справочник as $val)
                    {
                        $_SESSION['features_values'][strval($val->ИдЗначения)] = strval($val->Значение);
                    }
                }
            }
        }
    }


    public function import_product($xml_product)
    {
        global $simpla;
        global $dir;
        global $brand_option_name;
        global $full_update;
        // Товары


        //  Id товара и варианта (если есть) по 1С
        @list($product_1c_id, $variant_1c_id) = explode('#', $xml_product->Ид);
        if(empty($variant_1c_id))
            $variant_1c_id = '';
        
        // Ид категории
        if(isset($xml_product->Группы->Ид))
        $category_id = $_SESSION['categories_mapping'][strval($xml_product->Группы->Ид)];
        
        
        // Подгатавливаем вариант
        $variant_id = null;
        $variant = new stdClass;
        $values = array();
        if(isset($xml_product->ХарактеристикиТовара->ХарактеристикаТовара))
        foreach($xml_product->ХарактеристикиТовара->ХарактеристикаТовара as $xml_property)
            $values[] = $xml_property->Значение;
        if(!empty($values))
            $variant->name = implode(', ', $values);
        $variant->sku = (string)$xml_product->Артикул;
        $variant->external_id = $variant_1c_id;
        
        // Ищем товар
        $simpla->db->query('SELECT id FROM __products WHERE external_id=?', $product_1c_id);
        $product_id = $simpla->db->result('id');
        if(empty($product_id) && !empty($variant->sku))
        {
            $simpla->db->query('SELECT product_id, id FROM __variants WHERE sku=?', $variant->sku);
            $res = $simpla->db->result();
            if(!empty($res))
            {
                $product_id = $res->product_id;
                $variant_id = $res->id;
            }
        }
        
        // Если такого товара не нашлось		
        if(empty($product_id))
        {
            // Добавляем товар
            $description = '';
            if(!empty($xml_product->Описание))
                $description = $xml_product->Описание;
            $product_id = $simpla->products->add_product(
                                    array(
                                        'external_id'=>$product_1c_id, 
                                        'url'=>translit($xml_product->Наименование), 
                                        'name'=>$xml_product->Наименование, 
                                        'meta_title'=>$xml_product->Наименование, 
                                        'meta_keywords'=>$xml_product->Наименование, 
                                        'meta_description'=>$description,  
                                        'annotation'=>$description, 
                                        'body'=>$description
                                    )
                                );
            
            // Добавляем товар в категории
            if(isset($category_id))
            $simpla->categories->add_product_category($product_id, $category_id);

        
            // Добавляем изображение товара
            if(isset($xml_product->Картинка))
            {
                foreach($xml_product->Картинка as $img)
                {
                    $image = basename($img);
                    if(!empty($image) && is_file($dir.$image) && is_writable($simpla->config->original_images_dir))
                    {
                        rename($dir.$image, $simpla->config->original_images_dir.$image);
                        $simpla->products->add_image($product_id, $image);
                    }
                }
            }

        }
        //Если нашелся товар
        else
        {
            if(empty($variant_id) && !empty($variant_1c_id))
            {
                $simpla->db->query('SELECT id FROM __variants WHERE external_id=? AND product_id=?', $variant_1c_id, $product_id);
                $variant_id = $simpla->db->result('id');
            }
            elseif(empty($variant_id) && empty($variant_1c_id))
            {
                $simpla->db->query('SELECT id FROM __variants WHERE product_id=?', $product_id);
                $variant_id = $simpla->db->result('id');		
            }
            
            // Обновляем товар
            if($full_update)
            {
                $p = new stdClass();
                if(!empty($xml_product->Описание))
                {
                    $description = strval($xml_product->Описание);
                    $p->meta_description = $description;
                    $p->annotation = $description;
                    $p->body = $description;
                }
                $p->external_id = $product_1c_id;
                $p->url = translit($xml_product->Наименование);
                $p->name = $xml_product->Наименование;
                $p->meta_title = $xml_product->Наименование;
                $p->meta_keywords = $xml_product->Наименование;

                $product_id = $simpla->products->update_product($product_id, $p);
                
                // Обновляем категорию товара
                if(isset($category_id) && !empty($product_id))
                {
                    $query = $simpla->db->placehold('DELETE FROM __products_categories WHERE product_id=?', $product_id);
                    $simpla->db->query($query);
                    $simpla->categories->add_product_category($product_id, $category_id);
                }
                
            }
            
            // Обновляем изображение товара
            if(isset($xml_product->Картинка))
            {
                foreach($xml_product->Картинка as $img)
                {
                    $image = basename($img);
                    if(!empty($image) && is_file($dir.$image) && is_writable($simpla->config->original_images_dir))
                    {
                        $simpla->db->query('SELECT id FROM __images WHERE product_id=? ORDER BY position LIMIT 1', $product_id);
                        $img_id = $simpla->db->result('id');
                        if(!empty($img_id))
                            $simpla->products->delete_image($img_id);
                        rename($dir.$image, $simpla->config->original_images_dir.$image);
                        $simpla->products->add_image($product_id, $image);
                    }
                }
            }
            
        }
        
        // Если не найден вариант, добавляем вариант один к товару
        if(empty($variant_id))
        {
            $variant->product_id = $product_id;
            $variant->stock = 0;
            $variant_id = $simpla->variants->add_variant($variant);
        }
        elseif(!empty($variant_id))
        {
            $simpla->variants->update_variant($variant_id, $variant);
        }
        // Свойства товара
        if(isset($xml_product->ЗначенияСвойств->ЗначенияСвойства))
        {
            foreach ($xml_product->ЗначенияСвойств->ЗначенияСвойства as $xml_option)
            {
                if(isset($_SESSION['features_mapping'][strval($xml_option->Ид)]))
                {
                    $feature_id = $_SESSION['features_mapping'][strval($xml_option->Ид)];
                    if(isset($category_id) && !empty($feature_id))
                    {
                        $simpla->features->add_feature_category($feature_id, $category_id);
                        $values = array();
                        foreach($xml_option->Значение as $xml_value)
                        {
                            if(isset($_SESSION['features_values'][strval($xml_value)]))
                                $values[] = strval($_SESSION['features_values'][strval($xml_value)]);
                            else
                                $values[] = strval($xml_value);
                        }
                        $simpla->features->update_option($product_id, $feature_id, implode(' ,', $values));
                    }
                }
                // Если свойство оказалось названием бренда
                elseif(isset($_SESSION['brand_option_id']) && !empty($xml_option->Значение))
                {
                    $brand_name = strval($xml_option->Значение);
                    // Добавим бренд
                    // Найдем его по имени
                    $simpla->db->query('SELECT id FROM __brands WHERE name=?', $brand_name);
                    if(!$brand_id = $simpla->db->result('id'))
                        // Создадим, если не найден
                        $brand_id = $simpla->brands->add_brand(array('name'=>$brand_name, 'meta_title'=>$brand_name, 'meta_keywords'=>$brand_name, 'meta_description'=>$brand_name, 'url'=>translit($brand_name)));	
                    if(!empty($brand_id))
                        $simpla->products->update_product($product_id, array('brand_id'=>$brand_id));
                }
            }		
        }
        
        
        // Если нужно - удаляем вариант или весь товар
        if($xml_product->Статус == 'Удален')
        {
            $simpla->variants->delete_variant($variant_id);
            $simpla->db->query('SELECT count(id) as variants_num FROM __variants WHERE product_id=?', $product_id);
            if($simpla->db->result('variants_num') == 0)
                $simpla->products->delete_product($product_id);

        }
    }

    public function import_variant($xml_variant)
    {
        global $simpla;
        global $dir;
        $variant = new stdClass;
        //  Id товара и варианта (если есть) по 1С
        @list($product_1c_id, $variant_1c_id) = explode('#', $xml_variant->Ид);
        if(empty($variant_1c_id))
            $variant_1c_id = '';
        if(empty($product_1c_id))
            return false;

        $simpla->db->query('SELECT v.id FROM __variants v WHERE v.external_id=? AND product_id=(SELECT p.id FROM __products p WHERE p.external_id=? LIMIT 1)', $variant_1c_id, $product_1c_id);
        $variant_id = $simpla->db->result('id');
        
        $simpla->db->query('SELECT p.id FROM __products p WHERE p.external_id=?', $product_1c_id);
        $variant->external_id = $variant_1c_id;
        $variant->product_id = $simpla->db->result('id');
        if(empty($variant->product_id))
            return false;

        $variant->price = $xml_variant->Цены->Цена->ЦенаЗаЕдиницу;	
        
        if(isset($xml_variant->ХарактеристикиТовара->ХарактеристикаТовара))
        foreach($xml_variant->ХарактеристикиТовара->ХарактеристикаТовара as $xml_property)
            $values[] = $xml_property->Значение;
        if(!empty($values))
            $variant->name = implode(', ', $values);
        $sku = (string)$xml_variant->Артикул;
        if(!empty($sku))
            $variant->sku = $sku;
        
        
        // Конвертируем цену из валюты 1С в базовую валюту магазина
        if(!empty($xml_variant->Цены->Цена->Валюта))
        {
            // Ищем валюту по коду
            $simpla->db->query("SELECT id, rate_from, rate_to FROM __currencies WHERE code like ?", $xml_variant->Цены->Цена->Валюта);
            $variant_currency = $simpla->db->result();
            // Если не нашли - ищем по обозначению
            if(empty($variant_currency))
            {
                $simpla->db->query("SELECT id, rate_from, rate_to FROM __currencies WHERE sign like ?", $xml_variant->Цены->Цена->Валюта);
                $variant_currency = $simpla->db->result();
            }
            // Если нашли валюту - конвертируем из нее в базовую
            if($variant_currency && $variant_currency->rate_from>0 && $variant_currency->rate_to>0)
            {
                $variant->price = floatval($variant->price)*$variant_currency->rate_to/$variant_currency->rate_from;
            }	
        }
        
        $variant->stock = $xml_variant->Количество;

        if(empty($variant_id))
            $simpla->variants->add_variant($variant);
        else	
            $simpla->variants->update_variant($variant_id, $variant);
    }

    public function translit($text)
    {
        $ru = explode('-', "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я"); 
        $en = explode('-', "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch---Y-y---E-e-YU-yu-YA-ya");

        $res = str_replace($ru, $en, $text);
        $res = preg_replace("/[\s]+/ui", '-', $res);
        $res = strtolower(preg_replace("/[^0-9a-zа-я\-]+/ui", '', $res));
        
        return $res;  
    }
    */
}