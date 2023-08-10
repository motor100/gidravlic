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
