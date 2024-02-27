<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductDocument
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
     * Обновление документа pdf у товара
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model Product
     * @return mixed
     */
    public function file_update(): mixed
    {
        if (array_key_exists('input-pdf-file', $this->validated)) {

            if ($this->product->document) {
                if (Storage::exists($this->product->document->file)) {
                    Storage::delete($this->product->document->file);
                }
            }

            return Storage::putFile('public/uploads/products-documents', $this->validated["input-pdf-file"]);

        } else {

            return $this->product->document ? $this->product->document->file : NULL;
        }
    }
}