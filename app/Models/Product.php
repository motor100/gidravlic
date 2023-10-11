<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    /**
     * Один ко многим
     * Получить галерею к товару.
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }
}
