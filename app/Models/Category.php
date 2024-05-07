<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'cookie_name',
    //     'session_id',
    // ];

    /**
     * Один ко многим
     * Получить подкатегории.
     */
    // public function categories(): HasMany
    // {
    //     return $this->hasMany(ProductSubCategory::class, 'parent_category_id', 'category_id');
    // }

    /**
     * Один к одному
     * Получить изображение для этой категории
     */
    public function image(): HasOne
    {
        return $this->hasOne(CategoryImage::class, 'category_uuid', 'uuid');
    }

    /**
     * Один ко многим
     * Рекурсивное отношение
     * Получить подкатегории и все их дочерние подкатегории
     */
    // public function subcategories(): HasMany
    // {
    //     return $this->hasMany(ProductSubCategory::class, 'parent_category_id', 'category_id')->with('childrencategories');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
