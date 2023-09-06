<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class Cart
{
    /**
     * Получение товаров в корзине
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
}