<?php

namespace App\Services;

use Illuminate\Http\Request;

class Favourites
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Получение товаров в избранном
     */
    public function get()
    {
        $products = collect();

        if ($this->request->hasCookie('favourites')) {

            // Получение куки через фасад Cookie метод get
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            $keys = array_keys($favourites);

            $products = \App\Models\Product::whereIn('id', $keys)->get();
        }

        return $products;
    }
}