<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SubcategoryImage
{
    protected $subcategory;
    protected $validated;

    /**
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model
     */
    public function __construct($subcategory, $validated)
    {
        $this->subcategory = $subcategory;
        $this->validated = $validated;
    }
    
    /**
     * Обновление изображения у подкатегории
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model
     * @return mixed
     */
    public function image(): mixed
    {
        if (array_key_exists('input-main-file', $this->validated)) {
            if ($this->subcategory->image) {
                if (Storage::exists($this->subcategory->image->image)) {
                    Storage::delete($this->subcategory->image->image);
                }
            }

            return Storage::putFile('public/uploads/product-subcategories', $this->validated["input-main-file"]);

        } else {

            return $this->subcategory->image ? $this->subcategory->image->image : NULL;
        }
    }
}