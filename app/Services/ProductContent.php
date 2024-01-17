<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductContent
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
     * Обновление отметки хит
     * @param
     * @return mixed
     */
    public function hit(): mixed
    {
        // Преобразование on в 1
        return isset($this->validated["hit"]) ? 1 : NULL;
    }

    /**
     * Обновление отметки специальное предложение
     * @param
     * @return mixed
     */
    public function special_offer(): mixed
    {
        // Преобразование on в 1
        return isset($this->validated["special_offer"]) ? 1 : NULL;
    }
    
    /**
     * Обновление изображения у товара
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model Product
     * @return mixed
     */
    public function image(): mixed
    {
        if (array_key_exists('input-main-file', $this->validated)) {

            if ($this->product->content) {
                if (Storage::exists($this->product->content->image)) {
                    Storage::delete($this->product->content->image);
                }
            }

            return Storage::putFile('public/uploads/products', $this->validated["input-main-file"]);

        } else {

            // return $this->product->content ? $this->product->content->image : NULL;

            return $this->product->content->image;
        }
    }
}