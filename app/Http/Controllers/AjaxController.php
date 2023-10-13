<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function add_to_cart(Request $request): int
    {
        $id = $request->input('id');

        $cart_count = 0;
        $cart = [];
        
        if ($request->hasCookie('cart')) { // Если есть в куки cart, то добавляю в конец массива

            // Получение куки через фасад Cookie метод get
            $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

            // Если в массиве есть ключ с таким id, то прибавляю количество на 1
            if (array_key_exists($id, $cart)) {
                $cart[$id] = $cart[$id] + 1;
            } else {
                $cart[$id] = 1;
            }
            $cart_count = count($cart);

        } else {
            $cart_count = 1;
            $cart[$id] = 1;
        }

        $cart_count = $cart_count > 9 ? 9 : $cart_count;

        $cart_json = json_encode($cart);

        // Установка куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('cart', $cart_json, 525600);
        
        return $cart_count;
    }

    public function ajax_plus_cart(Request $request): bool
    {   
        $id = $request->input('id');

        // Получение куки через фасад Cookie метод get
        $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

        $cart[$id] = $cart[$id] + 1;

        $cart_json = json_encode($cart);

        // Установка куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('cart', $cart_json, 525600);

        return false;
    }

    public function ajax_minus_cart(Request $request): bool
    {   
        $id = $request->input('id');

        // Получение куки через фасад Cookie метод get
        $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

        $cart[$id] = $cart[$id] - 1;
        
        if ($cart[$id] > 1) {

            $cart_json = json_encode($cart);
            
            // Установка куки через фасад Cookie метод queue
            \Illuminate\Support\Facades\Cookie::queue('cart', $cart_json, 525600);
        }

        return false;
    }

    public function add_to_favourites(Request $request): int
    {
        $id = $request->input('id');

        $favourites_count = 0;
        $favourites = [];
        
        if ($request->hasCookie('favourites')) { // Если есть в куки favourites, то добавляю в конец массива

            // Получение куки через фасад Cookie метод get
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            // Если в массиве есть ключ с таким id, то прибавляю количество на 1
            if (array_key_exists($id, $favourites)) {
                $favourites[$id] = $favourites[$id] + 1;
            } else {
                $favourites[$id] = 1;
            }
            $favourites_count = count($favourites);

        } else {
            $favourites_count = 1;
            $favourites[$id] = 1;
        }

        $favourites_count = $favourites_count > 9 ? 9 : $favourites_count;

        $favourites_json = json_encode($favourites);

        // Установка куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('favourites', $favourites_json, 525600);
        
        return $favourites_count;
    }

    public function add_to_comparison(Request $request): int
    {
        $id = $request->input('id');

        $comparison_count = 0;
        $comparison = [];
        
        if ($request->hasCookie('comparison')) { // Если есть в куки comparison, то добавляю в конец массива

            // Получение куки через фасад Cookie метод get
            $comparison = json_decode(\Illuminate\Support\Facades\Cookie::get('comparison'), true);

            // Если в массиве есть ключ с таким id, то прибавляю количество на 1
            if (array_key_exists($id, $comparison)) {
                $comparison[$id] = $comparison[$id] + 1;
            } else {
                $comparison[$id] = 1;
            }
            $comparison_count = count($comparison);

        } else {
            $comparison_count = 1;
            $comparison[$id] = 1;
        }

        $comparison_count = $comparison_count > 9 ? 9 : $comparison_count;

        $comparison_json = json_encode($comparison);

        // Установка куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('comparison', $comparison_json, 525600);
        
        return $comparison_count;
    }

    public function we_use_cookie(): void
    {
        // Записываю в куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('we-use-cookie', 'yes', 525600);
    }

    public function rate_of_currency(): void
    {
        // Записываю в куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('rate-of-currency', 'yes', 525600);
    }

    /**
     * @param string order_id
     * @return void
     */
    public function send_message(Request $request): void
    {
        $order_id = $request->input('order_id');
        
        // Сообщение на почту о новом заказе
        (new \App\Services\Mailer($order_id))->send();
    }
    
}
