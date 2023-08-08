<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class MainController extends Controller
{
    public function home(): View
    {
        
        // Услуги
        $services = \App\Models\Service::orderBy('id', 'desc')->limit(4)->get();
        
        // Последняя новость
        $mainnew = \App\Models\Mainnew::latest()->first();

        // Последний отзыв
        $testimonial = \App\Models\Testimonial::latest()->first();

        return view('home', compact('mainnew', 'testimonial', 'services'));
    }

    public function houses()
    {
        $houses = \App\Models\House::all();

        return view('houses', compact('houses'));
    }

    public function house($slug)
    {
        $house = \App\Models\House::where('slug', $slug)->first();

        if (!$house) return abort(404);

        return view('house', compact('house'));
    }

    // Документы для дома

    public function mainnews()
    {
        $mainnews = \App\Models\Mainnew::all();

        return view('$mainnews', compact('mainnews'));
    }

    public function mainnew($slug)
    {
        $mainnew = \App\Models\Mainnew::where('slug', $slug)->first();

        if (!$mainnew) return abort(404);

        return view('$mainnew', compact('mainnew'));
    }



    public function politika_konfidencialnosti()
    {
        return view('politika-konfidencialnosti');
    }

    
}
