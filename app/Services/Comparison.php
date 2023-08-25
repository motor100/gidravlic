<?php

namespace App\Services;

use Illuminate\Http\Request;

class Comparison
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Получение товаров в сравнении
     */
    public function get()
    {
        $products = collect();

        if ($this->request->hasCookie('comparison')) {

            // Получение куки через фасад Cookie метод get
            $comparison = json_decode(\Illuminate\Support\Facades\Cookie::get('comparison'), true);

            $keys = array_keys($comparison);

            $products = \App\Models\Product::whereIn('id', $keys)->get();
        }

        return $products;
    }
}