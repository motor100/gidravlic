<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function poisk(): View
    {
        return view('poisk');
    }

    public function cart(): View
    {
        return view('cart');
    }

    public function favourites(): View
    {
        return view('favourites');
    }

    public function comparison(): View
    {
        return view('comparison');
    }

    public function company(): View
    {
        return view('company');
    }

    public function services(): View
    {
        return view('services');
    }

    public function payment(): View
    {
        return view('payment');
    }

    public function delivery(): View
    {
        return view('delivery');
    }

    public function warranty(): View
    {
        return view('warranty');
    }

    public function calculators(): View
    {
        return view('calculators');
    }

    public function contacts(): View
    {
        return view('contacts');
    }

    public function create_order(): View
    {
        return view('create-order');
    }

    public function thank_you(Request $request): View
    {
        if ($request->has('order_id') && $request->has('summ')) {

            $order_id = $request->input('order_id');
            $summ = $request->input('summ');
            $payment = $request->input('payment');

            return view('thank-you', compact('order_id', 'summ', 'payment'));
        } else {
            return view('thank-you');
        }

        // Для юкассы
        // $summ - сумма к оплате
        // $order_id - номер заказа
        // http://semena-darom1.ru/thankyou?order_number=5&summ=1865 - ссылка для редиректа после оплаты
        // без параметра payment
        // $request->url() . '?order_id=' . $order_id . '&summ=' . $summ
    }



    public function register1(): View
    {
        return view('register');
    }

    public function login1(): View
    {
        return view('login');
    }




    public function politika_konfidencialnosti(): View
    {
        return view('politika-konfidencialnosti');
    }


    public function we_use_cookie(): void
    {
        // Записываю в куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('we-use-cookie', 'yes', 525600);
    }
}
