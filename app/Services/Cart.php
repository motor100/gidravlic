<?php

namespace App\Services;

use Illuminate\Http\Request;

class Cart
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Получение товаров в корзине
     */
    public function get()
    {
        $products = collect();

        if ($this->request->hasCookie('cart')) {

            // Получение куки через фасад Cookie метод get
            $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

            $keys = array_keys($cart);

            $products = \App\Models\Product::whereIn('id', $keys)->get();
        }

        // Добавляю количество к каждому товару
        foreach ($products as $product) {
            $product->quantity = $cart[$product->id];
        }

        return $products;
    }
}