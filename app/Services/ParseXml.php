<?php

namespace App\Services;

use App\Models\Product;
use Zenwalker\CommerceML\CommerceML;
use Illuminate\Support\Str;

class ParseXml
{   
    // Массив slug для подкатегорий
    public $subcategory_slugs = [];
    
    /**
     * Документация
     * https://github.com/carono/php-commerceml
     * @param
     * @return bool
     */
    public function parse(): bool
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

                $subcategories_array[] = $this->subcategory($subcat1, $category);

                // Вложенные подкатегории subcat2
                foreach($subcat1->getChildren() as $subcat2) {
                    $subcategories_array[] = $this->subcategory($subcat2, $subcat1);
                }
            }
        }
        
        // Truncate
        \App\Models\ProductSubCategory::truncate();

        // Вставка в таблицу products_subcategories
        \App\Models\ProductSubCategory::insert($subcategories_array);

        // Товары
        foreach ($cml->catalog->products as $product) {
            // Название товара
            // $p_item["title"] = mb_substr($product->name, 0, 190); // Название товара (Товары->Товар->Наименование) и ограничение до 190 символов
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
            $description = $product->Описание; // Объект SimpleXmlElement

            $p_item["description"] = NULL;

            // Преобразование \n в <br>
            if ($description) {
                foreach($description as $value) {
                    $p_item["description"] = '<p>' . nl2br($value) . '</p>'; 
                }
            }            

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
                if (count($offer->prices)) {
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
    public function subcategory($subcat, $parent) {

        $s_item["title"] = mb_substr($subcat->name, 0, 190); // Название подкатегории и ограничение до 190 символов

        // slug
        $slug = Str::slug($s_item["title"]);

        // Проверка на уникальный slug. Поиск по ключу $slugs в массиве $this->subcategory_slugs
        $slug_unique = in_array($slug, $this->subcategory_slugs);

        if ($slug_unique) {
            $s_item["slug"] = $slug . "-" . Str::slug($parent->name);
        } else {
            $s_item["slug"] = $slug;
        }

        // Добавляю текущий $slug в массив $this->subcategory_slugs
        $this->subcategory_slugs[] = $slug;

        $s_item["category_id"] = $subcat->id;
        $s_item["parent_category_id"] = $parent->id;

        $s_item["created_at"] = now();
        $s_item["updated_at"] = now();

        return $s_item;
    }
}