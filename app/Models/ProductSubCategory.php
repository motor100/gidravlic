<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductSubCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_subcategories';

    /**
     * Один к одному
     * Получить изображения для подкатегории.
     */
    public function image(): HasOne
    {
        return $this->hasOne(SubcategoryImage::class, 'category_id', 'category_id');
    }

    /**
     * Один ко многим обратное отношение
     * Получить категорию для подкатегории.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id', 'category_id');
    }

    /**
     * Один ко многим
     * Применяется для рекурсивного отношения
     * Получить категорию для подкатегории.
     */
    public function childrencategories(): HasMany
    {
        return $this->HasMany(ProductSubCategory::class, 'parent_category_id', 'category_id');
    }
}
