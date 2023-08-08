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


    public function politika_konfidencialnosti(): View
    {
        return view('politika-konfidencialnosti');
    }
}
