<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_categories';

    /**
     * Один ко многим
     * Получить подкатегории.
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(ProductSubcategory::class, 'parent_category_id', 'category_id');
    }
}
