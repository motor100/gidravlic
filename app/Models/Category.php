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
    protected $fillable = [
        'title',
        'slug',
        'uuid',
        'parent_id',
        'parent_uuid',
        '_lft',
        '_rgt'
    ];

    /**
     * Один к одному
     * Получить изображение для этой категории
     */
    public function image(): HasOne
    {
        return $this->hasOne(CategoryImage::class, 'category_uuid', 'uuid');
    }

    /**
     * Поиск модели по slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
