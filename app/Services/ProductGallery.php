<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductGallery
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
     * Обновление галереи у товара
     * @return array
     */
    public function gallery_update(): array
    {
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
            $item["product_uuid"] = $this->product->product_id;
            $item["image"] = Storage::putFile('public/uploads/products-galleries', $value);
            $item["created_at"] = now();
            $item["updated_at"] = now();
            $gallery_array[] = $item;
        }

        return $gallery_array;
    }

    /**
     * Удаление галереи у товара
     * @return bool
     */
    public function gallery_destroy(): bool
    {
        foreach($this->product->gallery as $gl) {
            // Удаление файлов
            if (Storage::exists($gl->image)) {
                Storage::delete($gl->image);
            }
            // Удаление модели
            $gl->delete();
        }

        return false;
    }
}