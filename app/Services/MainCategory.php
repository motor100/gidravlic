<?php

namespace App\Services;

class MainCategory
{
    
    /**
     * Метод возвращает массив главных категорий
     * @param
     * @return array
     */
    public function main_category_list(): array
    {
        $categories = [
            [
                "title" => "Гидравлические станции",
                "slug" => "gidravliceskie-stancii",
                "uuid" => "de24edfe-7ab5-11ed-80e6-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Гидравлические распределители",
                "slug" => "gidravliceskie-raspredeliteli",
                "uuid" => "71ebf612-433a-11ed-9247-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Гидравлические насосы",
                "slug" => "gidravliceskie-nasosy",
                "uuid" => "f191c2e8-433a-11ed-9247-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Гидравлические моторы",
                "slug" => "gidravliceskie-motory",
                "uuid" => "53bfc6c8-4f92-11ed-8062-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Клапанная аппаратура",
                "slug" => "klapannaia-apparatura",
                "uuid" => "1984883a-433b-11ed-9247-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Коробки отбора мощности",
                "slug" => "korobki-otbora-moshhnosti",
                "uuid" => "4f72970c-433b-11ed-9247-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Модульная гидроаппаратура",
                "slug" => "modulnaia-gidroapparatura",
                "uuid" => "40bcac2a-8787-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Фильтры гидравлические",
                "slug" => "filtry-gidravliceskie",
                "uuid" => "af1cd60c-96ee-11ed-861e-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Картриджная аппаратура",
                "slug" => "kartridznaia-apparatura",
                "uuid" => "6c6091c0-8787-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Измерительная аппаратура",
                "slug" => "izmeritelnaia-apparatura",
                "uuid" => "c232287c-973f-11ed-861e-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Гидроцилиндры",
                "slug" => "gidrocilindry",
                "uuid" => "cc16d4b8-dffc-11ed-969b-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Быстроразъемные соединения БРС",
                "slug" => "bystrorazieemnye-soedineniia-brs",
                "uuid" => "f450114e-a792-11ed-939d-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Редукторы и мультипликаторы",
                "slug" => "reduktory-i-multiplikatory",
                "uuid" => "5915b5e8-8785-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Маслоохладители",
                "slug" => "maslooxladiteli",
                "uuid" => "b6c0b4e8-9633-11ed-861e-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Гидропневмо-аккумуляторы",
                "slug" => "gidropnevmo-akkumuliatory",
                "uuid" => "f4e03af0-8787-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Дистанционное управление",
                "slug" => "distancionnoe-upravlenie",
                "uuid" => "14776a32-8788-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Электроника и автоматика",
                "slug" => "elektronika-i-avtomatika",
                "uuid" => "2c4e90e0-8788-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Сопутствующие товары",
                "slug" => "soputstvuiushhie-tovary",
                "uuid" => "3cd3c91c-8788-11ee-908a-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "РВД",
                "slug" => "rvd",
                "uuid" => "bef875de-433a-11ed-9247-d8bbc193bc1b",
                "parent_id" => NULL,
                "parent_uuid" => NULL,
                "_lft" => 0,
                "_rgt" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        return $categories;
    }

    /**
     * Метод возвращает массив изображений для категорий
     * @param
     * @return array
     */
    public function main_category_image(): array
    {
        $images = [
            [
                "category_uuid" => "de24edfe-7ab5-11ed-80e6-d8bbc193bc1b", // Гидравлические станции
                "image" => "public/uploads/products-categories/category1.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "71ebf612-433a-11ed-9247-d8bbc193bc1b", // Гидравлические распределители
                "image" => "public/uploads/products-categories/category2.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "f191c2e8-433a-11ed-9247-d8bbc193bc1b", // Гидравлические насосы
                "image" => "public/uploads/products-categories/category3.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "53bfc6c8-4f92-11ed-8062-d8bbc193bc1b", // Гидравлические моторы
                "image" => "public/uploads/products-categories/category4.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "1984883a-433b-11ed-9247-d8bbc193bc1b", // Клапанная аппаратура
                "image" => "public/uploads/products-categories/category5.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "4f72970c-433b-11ed-9247-d8bbc193bc1b", // Коробки отбора мощности
                "image" => "public/uploads/products-categories/category6.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "40bcac2a-8787-11ee-908a-d8bbc193bc1b", // Модульная гидроаппаратура
                "image" => "public/uploads/products-categories/category7.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "af1cd60c-96ee-11ed-861e-d8bbc193bc1b", // Фильтры гидравлические
                "image" => "public/uploads/products-categories/category8.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "6c6091c0-8787-11ee-908a-d8bbc193bc1b", // Картриджная аппаратура
                "image" => "public/uploads/products-categories/category9.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "c232287c-973f-11ed-861e-d8bbc193bc1b", // Измерительная аппаратура
                "image" => "public/uploads/products-categories/category10.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "cc16d4b8-dffc-11ed-969b-d8bbc193bc1b", // Гидроцилиндры
                "image" => "public/uploads/products-categories/category11.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "f450114e-a792-11ed-939d-d8bbc193bc1b", // Быстроразъемные соединения БРС
                "image" => "public/uploads/products-categories/category12.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "5915b5e8-8785-11ee-908a-d8bbc193bc1b", // Редукторы и мультипликаторы
                "image" => "public/uploads/products-categories/category13.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "b6c0b4e8-9633-11ed-861e-d8bbc193bc1b", // Маслоохладители
                "image" => "public/uploads/products-categories/category14.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "f4e03af0-8787-11ee-908a-d8bbc193bc1b", // Гидропневмо-аккумуляторы
                "image" => "public/uploads/products-categories/category15.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "14776a32-8788-11ee-908a-d8bbc193bc1b", // Дистанционное управление
                "image" => "public/uploads/products-categories/category16.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "2c4e90e0-8788-11ee-908a-d8bbc193bc1b", // Электроника и автоматика
                "image" => "public/uploads/products-categories/category17.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "3cd3c91c-8788-11ee-908a-d8bbc193bc1b", // Сопутствующие товары
                "image" => "public/uploads/products-categories/category18.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "category_uuid" => "bef875de-433a-11ed-9247-d8bbc193bc1b", // РВД
                "image" => "public/uploads/products-categories/category19.png",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        return $images;
    }

    /**
     * Метод заполняет в таблице categories главные категории
     * Модель \App\Models\Category
     * @param
     * @return bool
     */
    public function set_main_category(): bool
    {
        return \App\Models\Category::insert($this->main_category_list());
    }

    /**
     * Метод заполняет в таблице categories_images изображения для главных категории
     * Модель \App\Models\CategoryImage
     * @param
     * @return bool
     */
    public function set_main_category_image(): bool
    {
        return \App\Models\CategoryImage::insert($this->main_category_image());
    }

    /**
     * Метод заполняет в таблице categories главные категории и categories_images изображения для главных категории
     * Модель \App\Models\Category
     * Модель \App\Models\CategoryImage
     * @param
     * @return bool false
     */
    public function set_main_category_and_image(): bool
    {
        \App\Models\Category::insert($this->main_category_list());
        \App\Models\CategoryImage::insert($this->main_category_image());

        return false;
    }
}