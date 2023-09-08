<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'comment',
        'delivery_method',
        'payment_method',
        'delivery_company',
        'payment_status',
        'summ',
        'message',
    ];

    /**
     * Многие ко многим
     * Получить товары для этого заказа
     * Один заказ имеет много товаров
     * Метод withPivot() добавляет дополнительные поля промежуточной таблицы
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity');
    }

}
