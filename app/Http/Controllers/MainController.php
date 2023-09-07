<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        // Main slider LIFO
        $sliders = \App\Models\MainSlider::orderby('id', 'desc')->get();
        
        // Special offer
        $special_offer_products = \App\Models\Product::limit(4)
                                                        ->inRandomOrder()
                                                        ->get();
        
        return view('home', compact('sliders', 'special_offer_products'));
    }

    // 
    public function catalog(): View
    {
        return view('catalog');
    }

    public function single_product($slug): mixed
    {
        if (strlen($slug) > 3 && strlen($slug) < 100) {

            $product = \App\Models\Product::where('slug', $slug)->first();

            if ($product) {

                // Ограничение количества элементов в коллекции галерея
                // $product->galleries->slice(0, 3);

                return view('single-product', compact('product'));
            }
        }

        return abort(404);
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
        $products = (new \App\Services\Cart())->get();
        
        return view('cart', compact('products'));
    }

    public function clear_cart(): RedirectResponse
    {
        // Удаление из куки cart через фасад Cookie метод forget
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('cart'));

        return back();
    }

    public function rm_from_cart(Request $request): RedirectResponse
    {   
        $id = $request->input('id');

        if ($request->hasCookie('cart') && $id) {

            // Получение куки через фасад Cookie метод get
            $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

            // Удаляю ключ из массива если он существует
            if (array_key_exists($id, $cart)) {
                unset($cart[$id]);
            }

            $cart_json = json_encode($cart);

            // Записываю новый массив в куки через фасад Cookie метод queue
            \Illuminate\Support\Facades\Cookie::queue('cart', $cart_json, 525600);
        }

        return redirect('/cart');
    }

    public function favourites(Request $request): View
    {
        $products = (new \App\Services\Favourites($request))->get();
        
        return view('favourites', compact('products'));
    }

    public function clear_favourites(): RedirectResponse
    {
        // Удаление из куки favourites через фасад Cookie метод forget
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('favourites'));

        return back();
    }

    public function rm_from_favourites(Request $request)
    {
        $id = $request->input('id');

        if ($request->hasCookie('favourites') && $id) {
            
            // Получение куки через фасад Cookie метод get
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            // Удаляю ключ из массива если он существует
            if (array_key_exists($id, $favourites)) {
                unset($favourites[$id]);
            }

            $favourites_json = json_encode($favourites);

            // Записываю новый массив в куки через фасад Cookie метод queue
            \Illuminate\Support\Facades\Cookie::queue('favourites', $favourites_json, 525600);

        }

        return redirect('/favourites');
    }

    public function comparison(Request $request): View
    {
        $products = (new \App\Services\Comparison($request))->get();
        
        return view('comparison', compact('products'));
    }

    public function clear_comparison(): RedirectResponse
    {
        // Удаление из куки comparison через фасад Cookie метод forget
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('comparison'));

        return back();
    }

    public function rm_from_comparison(Request $request)
    {
        $id = $request->input('id');

        if ($request->hasCookie('comparison') && $id) {
            
            // Получение куки через фасад Cookie метод get
            $comparison = json_decode(\Illuminate\Support\Facades\Cookie::get('comparison'), true);

            // Удаляю ключ из массива если он существует
            if (array_key_exists($id, $comparison)) {
                unset($comparison[$id]);
            }

            $comparison_json = json_encode($comparison);

            // Записываю новый массив в куки через фасад Cookie метод queue
            \Illuminate\Support\Facades\Cookie::queue('comparison', $comparison_json, 525600);

        }

        return redirect('/comparison');
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

    public function contacts(): View
    {
        return view('contacts');
    }

    public function create_order(): View
    {
        // Получение моделей товаров
        $products = (new \App\Services\Cart())->get();

        // Расчет стоимости и количества всех товаров
        $quantity_summ = 0;
        $total_summ = 0;

        foreach($products as $product) {
            $quantity_summ += $product->quantity;
            $total_summ += $product->quantity * $product->price;
        }

        return view('create-order', compact('products', 'quantity_summ', 'total_summ'));
    }

    public function create_order_handler(Request $request)
    {
        $validated = $request->validate([
            'customer_type' => 'required',
            'name'=> 'required|min:3|max:50',
            'email'=> 'required|min:3|max:50',
            'phone'=> 'required|size:18',
            'message'=> 'required|min:3|max:100',
            'delivery_method' => 'required',
            'payment_method' => 'required',
            'inn' => 'nullable|numeric',
            'manager' => 'nullable',
            'delivery_company' => 'nullable'
        ]);

        // Получение аутентифицированного пользователя
        $user = $request->user();

        // тут
        // Создаю новую модель Order и получаю id новой записи
        $order_id = \App\Models\Order::insertGetId([
            'first_name' => $validated['first-name'],
            'last_name' => $validated['last-name'],
            'phone'=> $phone,
            'email'=> $validated['email'],
            'address'=> $validated['address'],
            'price' => $validated['summ'],
            'user_id' => $user ? $user->id : NULL,
            'status' => 'В обработке',
            'comment' => NULL,
            'delivery' => $validated['delivery'],
            'payment' => $validated['payment'],
            'payment_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Получение куки через фасад Cookie метод get
        $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);
        
        $insert_array = [];

        foreach($cart as $key => $value) {
            $row['order_id'] = $order_id;
            $row['product_id'] = $key;
            $row['quantity'] = $value;
            $row['created_at'] = now();
            $row['updated_at'] = now();
            $insert_array[] = $row;
        }

        // Создание моделей OrderProduct
        \App\Models\OrderProduct::insert($insert_array);

        // Удаление куки
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('cart'));
        
        // Редирект на страницу оплаты
        return redirect()
                ->route('thankyou', [
                    'order_id' => $order_id,
                    'summ' => $validated['summ'],
                    'payment' => $validated['payment']
                ]);
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


    // temp
    public function category(): View
    {
        $products = \App\Models\Product::paginate(24);
        
        return view('category', compact('products'));
    }

    public function subcategory(): View
    {
        $products = \App\Models\Product::paginate(24);
        
        return view('subcategory', compact('products'));
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

    public function page_404(Request $request): mixed
    {
        // Получаю текущий URL без доменного имени
        $requestUri = $request->getRequestUri();

        // Если строка содержит /admin/
        if (str_contains($requestUri, "/admin/")) {
            return view('dashboard.404');
        }
        
        // Во всех других случаях
        return abort(404);
    }

    public function sitemap(): Response
    {
        $products = \App\Models\Product::select('slug')->get();

        return response()
                ->view('sitemap', compact('products'))
                ->header('Content-Type', 'text/xml');
    }
}
