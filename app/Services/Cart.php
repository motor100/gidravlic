<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class Cart
{
    /**
     * Получение всех товаров в корзине
     * К каждому товару добавлено свойство quantity - количество каждого товара
     */
    public function get()
    {
        $products = collect();

        if (Cookie::has('cart')) {

            // Получение куки через фасад Cookie метод get
            $cart = json_decode(Cookie::get('cart'), true);

            $keys = array_keys($cart);

            $products = Product::whereIn('id', $keys)->get();

            // Добавляю количество к каждому товару
            foreach ($products as $product) {
                $product->quantity = $cart[$product->id];
            }
        }

        return $products;
    }

    /**
     * Расчет суммы всех товаров в корзине
     */
    public function total_summ(): int
    {
        $products = $this->get();
        
        $total_summ = 0;

        foreach($products as $product) {
            $total_summ += $product->quantity * $product->price;
        }

        return $total_summ;
    }

    /**
     * Расчет количества всех товаров
     */
    public function quantity_summ(): int
    {
        $products = $this->get();
        
        $quantity_summ = 0;

        foreach($products as $product) {
            $quantity_summ += $product->quantity;
        }

        return $quantity_summ;
    }
}