<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    /**
     * Один ко многим
     * Получить галерею к товару.
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(ProductGallery::class, 'product_uuid', 'product_id');
    }

    /**
     * Один к одному
     * Получить контент к товару.
     */
    public function content(): HasOne
    {
        return $this->hasOne(ProductContent::class, 'product_id', 'product_id');
    }

    /**
     * Один к одному
     * Получить документ к товару.
     */
    public function document(): HasOne
    {
        return $this->hasOne(ProductDocument::class, 'product_id', 'product_id');
    }
}
