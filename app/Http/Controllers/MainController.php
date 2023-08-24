<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MainController extends Controller
{
    public function home(): View
    {
        $special_offer_products = \App\Models\Product::limit(4)
                                                        ->inRandomOrder()
                                                        ->get();
        
        return view('home', compact('special_offer_products'));
    }

    public function catalog(): View
    {
        return view('catalog');
    }

    public function single_product(): View
    {
        $product = \App\Models\Product::find(1);
        
        return view('single-product', compact('product'));
    }

    public function poisk(Request $request): View
    {
        $search_query = $request->input('search_query');

        if (mb_strlen($search_query) < 3 || mb_strlen($search_query) > 40) {
            return redirect('/');
        }

        $search_query = htmlspecialchars($search_query);

        if (!$search_query) {
            return redirect('/');
        }

        $search_query = htmlspecialchars($search_query);

        $products = \App\Models\Product::where('title', 'like', "%{$search_query}%")->get();

        if (!$products) {
            return redirect('/');
        };

        return view('poisk', compact('products', 'search_query'));
    }

    public function cart(): View
    {
        return view('cart');
    }

    public function favourites(Request $request): View
    {
        $products = collect();

        if ($request->hasCookie('favourites')) {

            // Получение куки через фасад Cookie метод get
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            $keys = array_keys($favourites);

            $products = \App\Models\Product::whereIn('id', $keys)->get();
        }
        
        return view('favourites', compact('products'));
    }


    public function clear_favourites(): RedirectResponse
    {
        // Удаление из куки favourites через фасад Cookie метод forget
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('favourites'));

        // return redirect('/favourites');
        return back();
    }

    public function comparison(): View
    {
        return view('comparison');
    }

    public function company(): View
    {
        $testimonials = \App\Models\Testimonial::whereNotNull('publicated_at')
                                                ->orderBy('id', 'desc')
                                                ->paginate(5);
        
        return view('company', compact('testimonials'));
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

    public function category(): View
    {
        $products = \App\Models\Product::paginate(24);
        
        return view('category', compact('products'));
    }




    public function politika_konfidencialnosti(): View
    {
        return view('politika-konfidencialnosti');
    }

    public function polzovatelskoe_soglashenie_s_publichnoj_ofertoj(): View
    {
        return view('polzovatelskoe-soglashenie-s-publichnoj-ofertoj');
    }
    
    public function garantiya_vozvrata_denezhnyh_sredstv(): View
    {
        return view('garantiya-vozvrata-denezhnyh-sredstv');
    }

}
