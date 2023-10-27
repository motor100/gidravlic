<?php

namespace App\Services;

use App\Models\Product;
use Zenwalker\CommerceML\CommerceML;
use Illuminate\Support\Str;

class ParseXml
{   
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

        $insert_array = [];
        $slugs = [];

        // Группы каталога 1С - категории товаров
        // dd($cml->classifier->groups);

        foreach ($cml->catalog->products as $product) {
            // Название товара
            $item["title"] = mb_substr($product->name, 0, 190); // Выводим название товара (Товары->Товар->Наименование) и ограничение символов до 190

            // slug
            $slug = Str::slug($item["title"]);

            // Проверка на уникальный slug. Поиск по ключу в массиве $slugs
            $slug_unique = array_search($slug, $slugs);

            if ($slug_unique > 0) {
                $item["slug"] = $slug . "-" . rand();
            } else {
                $item["slug"] = $slug;
            }

            // Добавляю текущий $slug в массив $slugs
            $slugs[] = $slug;

            // product_id
            $item["product_id"] = $product->id;

            if ($product->group) {
                // category_id
                $item["category_id"] = $product->group->id;
                // group_name
                // $item["category_name"] = $product->group->name;
            } else {
                // category_id
                $item["category_id"] = '00000000-0000-0000-0000-000000000000';
                // category_name
                // $item["category_name"] = '';
            }

            $item["image"] = NULL;
            $item["description"] = NULL;

            // Артикул
            $item["sku"] = $product->Артикул;
            

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
                    $item["stock"] = 0;
                } else {
                    $item["stock"] = $offer->Количество;
                }

                // Убрать это условие когда будут цены
                if (count($offer->prices)) {
                    $item["price"] = $offer->prices[0]->cost; // Выводим первую цену предложения (Предложения->Предложение->Цены->Цена->ЦенаЗаЕдиницу)
                } else {
                    $item["price"] = 0;
                }
                
            }

            $item["hit"] = NULL;

            $item["created_at"] = now();
            $item["updated_at"] = now();

            $insert_array[] = $item;
        }

        // Truncate
        Product::truncate();

        // Вставка в БД
        $products = Product::insert($insert_array);
        
        return $products;
    }
}