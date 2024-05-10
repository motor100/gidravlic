<?php

namespace App\Services;

use App\Models\Product;
use Zenwalker\CommerceML\CommerceML;
use Illuminate\Support\Str;

class ParseXml
{   
    // Массив slug для подкатегорий
    protected $subcategory_slugs = [];

    // Массив категорий для вставки в таблицу categories
    protected $category_array = [];
    
    /**
     * Документация
     * https://github.com/carono/php-commerceml
     * @param
     * @return bool
     */
    // public function parse(): bool
    public function parse()
    {
        // $filePath - полный путь до XML файла import.xml или offers.xml
        $filePath = public_path('storage/uploads/1c_catalog/');

        $cml = new CommerceML();

        $cml->loadImportXml($filePath . 'import.xml'); // Загружаем товары
        $cml->loadOffersXml($filePath . 'offers.xml'); // Загружаем предложения

        // Массив товаров
        $products_array = [];
        
        // Массив slug для товаров
        $product_slugs = [];

        // Массив slug для подкатегорий
        // $subcategory_slugs = [];

        // Группы каталога 1С - категории товаров
        // Массив подкатегорий
        $subcategories_array = [];

        // Категории и подкатегории и вложенные подкатегории
        // Категории category
        foreach($cml->classifier->groups as $category) {

            // Подкатегории subcat1
            foreach($category->getChildren() as $subcat1) {

                $subcategories_array[] = $this->category($subcat1, $category);

                // Вложенные подкатегории subcat2
                foreach($subcat1->getChildren() as $subcat2) {
                    $subcategories_array[] = $this->category($subcat2, $subcat1);
                }
            }
        }

        // Получение списка главных категорий
        $main_categories = (new \App\Services\MainCategory())->main_category_list();
        
        // Объединение массивов $main_categories и $subcategories_array в один
        $categories_array = array_merge($main_categories, $subcategories_array);

        // Установка ключа parent_id
        $categories_array = $this->set_parent_id($categories_array);

        // Truncate
        \App\Models\Category::truncate();

        // Вставка подкатегорий
        \App\Models\Category::insert($categories_array);

        // Заполнение _lft и _rgt nested-set
        \App\Models\Category::fixTree();

        // Товары
        foreach ($cml->catalog->products as $product) {

            // Название товара главное
            // $p_item["title"] = mb_substr($product->name, 0, 190); // Название товара (Товары->Товар->Наименование) и ограничение до 190 символов

            // Название товара второе
            $p_item["title"] = mb_substr($product->requisites[2]->value, 0, 190); // Реквизит Полное наименование

            // slug
            $slug = Str::slug($p_item["title"]);

            // Проверка на уникальный slug. Поиск по ключу в массиве $slugs
            $slug_unique = in_array($slug, $product_slugs);

            if ($slug_unique) {
                $p_item["slug"] = $slug . "-" . rand();
            } else {
                $p_item["slug"] = $slug;
            }

            // Добавляю текущий $slug в массив $product_slugs
            $product_slugs[] = $slug;

            // product_id
            $p_item["product_id"] = $product->id;

            if ($product->group) {
                // category_id
                $p_item["category_id"] = $product->group->id;
                // group_name
                // $item["category_name"] = $product->group->name;
            } else {
                // category_id
                $p_item["category_id"] = '00000000-0000-0000-0000-000000000000';
                // category_name
                // $item["category_name"] = '';
            }

            // Описание
            // $description = $product->Описание; // Объект SimpleXmlElement

            // $p_item["description"] = NULL;

            // Преобразование \n в <br>
            // if ($description) {
            //     foreach($description as $value) {
            //         $p_item["description"] = '<p>' . nl2br($value) . '</p>'; 
            //     }
            // }            

            // Артикул
            $p_item["sku"] = $product->Артикул;

            // Свойства property
            // foreach($product->properties as $property) {
            //     $p_item = "";
            //     $p_item .= $property->value . " ";
            //     $item["property"] = $p_item;
            // }
            
            // $item["property"] = $product->properties[0]->value;

            // Реквизиты requisite
            // $item["requisite"] = $product->requisites[0]->value;
            // $item["requisite"] = json_encode($product->requisites);

            foreach ($product->offers as $offer) {
                // Количество
                if ($offer->Количество < 0) {
                    $p_item["stock"] = 0;
                } else {
                    $p_item["stock"] = $offer->Количество;
                }

                // Убрать это условие когда будут цены
                if (count($offer->prices) > 0) {
                    $p_item["price"] = $offer->prices[0]->cost; // Выводим первую цену предложения (Предложения->Предложение->Цены->Цена->ЦенаЗаЕдиницу)
                } else {
                    $p_item["price"] = 0;
                }
            }

            $p_item["created_at"] = now();
            $p_item["updated_at"] = now();

            $products_array[] = $p_item;
        }

        // Truncate
        Product::truncate();

        // Вставка в таблицу products
        $products = Product::insert($products_array);

        return $products;
    }

    /**
     * Функция возвращает массив для вставки в таблицу product_subcategories
     */
    public function category($subcat, $parent) {

        $s_item["title"] = mb_substr($subcat->name, 0, 190); // Название подкатегории и ограничение до 190 символов

        // slug
        $slug = Str::slug($s_item["title"]);

        // Проверка на уникальный slug. Поиск по ключу $slugs в массиве $this->subcategory_slugs
        if (array_key_exists($slug, $this->subcategory_slugs)) {
            $s_item["slug"] = $slug . "-" . Str::slug($parent->name);
        } else {
            $s_item["slug"] = $slug;
        }

        // Добавляю текущий $slug в массив $this->subcategory_slugs
        $this->subcategory_slugs[$slug] = $slug;

        $s_item["uuid"] = $subcat->id;
        $s_item["parent_id"] = NULL;
        $s_item["parent_uuid"] = $parent->id;
        $s_item["_lft"] = 0;
        $s_item["_rgt"] = 0;

        $s_item["created_at"] = now();
        $s_item["updated_at"] = now();

        return $s_item;
    }

    /**
     * Перебор массива, получение ключа parent_uuid и сравнение с ключом uuid
     * @param array
     * @return array
     */
    public function set_parent_id(array $categories_array): array
    {   
        foreach($categories_array as $key1 => $cat) {
            foreach($categories_array as $key2 => $value) {
                if ($cat["parent_uuid"] == $value["uuid"]) {
                    $categories_array[$key1]["parent_id"] = $key2 + 1;
                }
            }
        }

        return $categories_array;
    }
}