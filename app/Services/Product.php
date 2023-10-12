<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Product
{
    protected $product;
    protected $validated;

    /**
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model Product
     */
    public function __construct($product, $validated)
    {
        $this->product = $product;
        $this->validated = $validated;
    }
    
    /**
     * Обновление изображения у товара
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model Product
     * @return string
     */
    
    public function image_update(): string
    {
        if (array_key_exists('input-main-file', $this->validated)) {
            if (Storage::exists($this->product->image)) {
                Storage::delete($this->product->image);
            }

            return Storage::putFile('public/uploads/products', $this->validated["input-main-file"]);

        } else {

            return $this->product->image;
        }
    }

    /**
     * Обновление галереи у товара
     * @return bool
     */
    public function gallery_update(): bool
    {
        if (array_key_exists('input-gallery-file', $this->validated)) {
            // Удаление галереи
            foreach ($this->product->gallery as $gl) {
                // Удаление файлов
                if (Storage::exists($gl->image)) {
                    Storage::delete($gl->image);
                }
                // Удаление модели
                $gl->delete();
            }

            // Вставка новых файлов и моделей
            $gallery_array = [];

            foreach ($this->validated['input-gallery-file'] as $value) {
                $item = [];
                $item["product_id"] = $this->product->id;
                $item["image"] = Storage::putFile('public/uploads/products-galleries', $value);
                $item["created_at"] = now();
                $item["updated_at"] = now();
                $gallery_array[] = $item;
            }

            
        }

        return false;
    }
}