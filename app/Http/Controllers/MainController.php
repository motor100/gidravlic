<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class MainController extends Controller
{
    public function home(): View
    {
        // Main slider LIFO
        $sliders = \App\Models\MainSlider::orderby('id', 'desc')->get();
        
        // Special offer
        $special_offer_products = \App\Models\Product::whereHas('content', function (Builder $query) {
                    return $query->whereNotNull('special_offer');
                })
                ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                ->limit(4)
                ->inRandomOrder()
                ->get();
        
        return view('home', compact('sliders', 'special_offer_products'));
    }

    public function catalog(): View
    {
        // Категории
        $categories = \App\Models\ProductCategory::all();

        // Все товары в категориях
        $products = \App\Models\Product::where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                        ->paginate(24);
        
        return view('catalog', compact('products', 'categories'));
    }

    public function cat(): RedirectResponse
    {
        return redirect('/');
    }

    public function category($slug): mixed
    {
        // Категория
        $category = \App\Models\ProductCategory::where('slug', $slug)->get();

        // Если есть коллекция $category и количество элементов = 1
        if ($category && $category->count() == 1) {

            // Подкатегории
            $subcategories = $category[0]->subcategories;
            
            // Объединение главной категории и ее подкатегорий в одну коллекцию
            $categories = $category->merge($subcategories);

            // Массив с category_id
            $cats = [];

            foreach($categories as $cat) {
                $cats[] = $cat->category_id;
            }

            // Товары из главной категории и ее подкатегорий
            $products = \App\Models\Product::whereIn('category_id', $cats)->paginate(24);

            return view('category', compact('products', 'category', 'subcategories'));
        }

        return abort(404);
    }

    public function subcategory($cat, $subcat): mixed
    {
        // Категория
        $category = \App\Models\ProductCategory::where('slug', $cat)->first();

        if ($category) {
            // Подкатегория
            $subcategory = \App\Models\ProductSubcategory::where('slug', $subcat)->first();

            if ($subcategory) {
                
                // Товары в подкатегории
                $products = \App\Models\Product::where('category_id', $subcategory->category_id)
                                                ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                                ->paginate(24);
    
                return view('subcategory', compact('products', 'subcategory'));
            } else {
                return abort(404);
            }
        }

        return abort(404);
    }

    public function single_product($slug): mixed
    {
        $product = \App\Models\Product::where('slug', $slug)->first();

        if ($product) {

            // Ограничение количества элементов в коллекции галерея
            // $product->galleries->slice(0, 3);

            return view('single-product', compact('product'));
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

        $products = \App\Models\Product::where('title', 'like', "%{$search_query}%")
                                        ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                        ->get();

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

    public function rm_from_favourites(Request $request): RedirectResponse
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

    public function rm_from_comparison(Request $request): RedirectResponse
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

    public function special_offer(): View
    {
        $products = \App\Models\Product::whereHas('content', function (Builder $query) {
                    return $query->whereNotNull('special_offer');
                })
                ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                ->paginate(24);

        return view('special-offer', compact('products'));
    }

    public function create_order(): mixed
    {
        // Получение моделей товаров
        $products = (new \App\Services\Cart())->get();

        // Если в корзине товаров нет, то редирект на главную
        if($products->count() == 0) {
            return redirect('/');
        }

        // Расчет количества всех товаров
        $quantity_summ = (new \App\Services\Cart())->quantity_summ();

        // Расчет стоимости всех товаров
        $total_summ = (new \App\Services\Cart())->total_summ();

        return view('create-order', compact('products', 'quantity_summ', 'total_summ'));
    }

    public function create_order_handler(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_type' => 'required',
            'name'=> 'required|min:3|max:50',
            'email'=> 'required|min:3|max:50',
            'phone'=> 'required|size:18',
            'message'=> 'nullable|min:3|max:100',
            'delivery_method' => 'required',
            'payment_method' => 'required',
            'inn' => 'nullable|numeric',
            'manager' => 'nullable',
            'delivery_company' => 'nullable'
        ]);

        $order_id = (new \App\Services\Order($request, $validated))->create();        

        // Расчет суммы всех товаров
        $summ = (new \App\Services\Cart())->total_summ();

        // Удаление куки
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('cart'));
        
        // Редирект на страницу оплаты
        return redirect()
                ->route('thank-you', [
                    'order_id' => $order_id,
                    'summ' => $summ,
                    'payment_method' => $validated['payment_method']
                ]);
    }

    public function thank_you(Request $request): View
    {
        if ($request->has('order_id') && $request->has('summ')) {

            $order_id = $request->input('order_id');
            $summ = $request->input('summ');
            $payment_method = $request->input('payment_method');

            return view('thank-you', compact('order_id', 'summ', 'payment_method'));
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
    public function http_auth()
    {
        // dd(file_get_contents('storage/uploads/test.txt'));
        
        // $response = \Illuminate\Support\Facades\Http::attach('attachment', file_get_contents('storage/test.txt'), 'test.txt')
        //                                                 ->get('http://lartest1.ru/1c_exchange.php?type=catalog&mode=file&filename=test.txt');

        /*
        $response = \Illuminate\Support\Facades\Http::attach('attachment', file_get_contents('storage/uploads/test.txt'), 'test.txt')
                                                        // ->withHeaders([ 'Content-Type' => 'multipart/form-data' ])
                                                        ->post('https://test.mybutton.ru/get-file', [
                                                            'type' => 'catalog',
                                                            'mode' => 'file',
                                                            'filename' => 'file.txt',
                                                        ]);
        */

        
        /*
        $content = json_encode(file_get_contents('storage/uploads/test.txt'));

        $response = \Illuminate\Support\Facades\Http::post('http://test.mybutton.ru/get-file', $content);
        */
                                                        
        /*
        $photo = file_get_contents('storage/uploads/test.txt');
        */
        
        /**
         * Прикрепляется файл и параметры
         */
        /*
        $response = \Illuminate\Support\Facades\Http::attach('attachment', file_get_contents('storage/uploads/test.txt'), 'photo.jpg')
                                                        ->post('http://lartest1.ru/get-file', [
                                                            'type' => 'catalog',
                                                            'mode' => 'import',
                                                            'filename' => 'test.txt',
                                                       ])
                                                    //    ->withBody(file_get_contents('storage/uploads/test.txt'));
        */

        $response = \Illuminate\Support\Facades\Http::withBody(file_get_contents('storage/uploads/test.txt'))
                                                        ->post('http://lartest1.ru/get-file?type=catalog&mode=file&filename=1c_catalog.xml&sessid=7f8ec88162e001fdccabfdd202653fc6');

        /*
        $response = \Illuminate\Support\Facades\Http::post('http://lartest1.ru/get-file', [
                                                            'type' => 'catalog',
                                                            'mode' => 'import',
                                                            'filename' => 'test.txt',
                                                        ]);
        */
        

        /*
        $response = \Illuminate\Support\Facades\Http::post('http://lartest1.ru/get-file', [
                                                            'type' => 'catalog',
                                                            'mode' => 'import',
                                                            'filename' => 'test.txt',
                                                        ]);
        */


        /*
        // $url = 'https://test.mybutton.ru/get-file';
        $url = 'http://lartest1.ru/get-file';

        $headers = array(
            "content-type" => "application/json",
            // 'сontent-type: application/x-www-form-urlencoded',
        );

        $params = [
            // file_get_contents('storage/uploads/test.txt'),
            'filename' => 'tt1.txt',
            // file_get_contents('storage/uploads/test.txt')
        ];

        // dd(file_get_contents('storage/uploads/test.zip')));

        $response = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                // 'header'  => $headers,
                // 'header'  => 'Content-type: application/json',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                // 'content' => file_get_contents('storage/uploads/test.txt'),
                // 'content' => json_encode($params),
                // 'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        */











        // https://test.mybutton.ru/1c_exchange.php

        // $response = \Illuminate\Support\Facades\Http::post('https://test.mybutton.ru/1c_exchange.php', [
        //                                                     'type' => 'sale',
        //                                                     'mode' => 'query',
        //                                                 ]);

        // $response = \Illuminate\Support\Facades\Http::get('http://lartest1.ru/1c_exchange.php?type=catalog&mode=init');

        // $response = \Illuminate\Support\Facades\Http::withBasicAuth('Admin', 'secret123')->get('https://test.mybutton.ru/1c_exchange.php?type=sale&mode=checkauth');
        // $response = \Illuminate\Support\Facades\Http::withBasicAuth('Admin', 'secret123')->get('https://test.mybutton.ru/1c_exchange.php?type=catalog&mode=checkauth');
        // $response = \Illuminate\Support\Facades\Http::withBasicAuth('Admin', 'secret123')->get('http://lartest1.ru/1c_exchange.php?type=catalog&mode=checkauth');

        // $response = \Illuminate\Support\Facades\Http::get('https://test.mybutton.ru/1c_exchange.php?type=sale&mode=init');
        
        /*
        $response = \Illuminate\Support\Facades\Http::post('https://test.mybutton.ru/get-file',[
                                                                'type' => 'catalog',
                                                                'mode' => 'import',
                                                                'filename' => 'test.txt',
                                                            ]);
        */

        /*
        $response = \Illuminate\Support\Facades\Http::withBasicAuth('Admin', 'secret123')
                                                        ->get('http://lartest1.ru/1c_exchange.php', [
                                                            'type' => 'sale',
                                                            'mode' => 'checkout',
                                                        ]);
        */

        // $response = \Illuminate\Support\Facades\Http::withHeaders([ 'Content-Type' => 'multipart/form-data' ])
        //                                         ->withToken('dlgkJCWVLiJil0W7FKrfd3nGzmMAzAy6YTde445e')
        //                                         ->attach('file', 'storage/test.txt')
        //                                         ->post('http://lartest1.ru/1c_exchange.php', [
        //                                             'type' => 'catalog',
        //                                             'mode' => 'file',
        //                                             '_token' => 'dlgkJCWVLiJil0W7FKrfd3nGzmMAzAy6YTde445e',
        //                                         ]);

                                                        

        return $response;
    }

    public function insert_categories()
    {
        $categories = [
            'Гидравлические станции',
            'Гидравлические распределители',
            'Гидравлические насосы',
            'Гидравлические моторы',
            'Клапанная аппаратура',
            'Коробки отбора мощности',
            'Модульная гидроаппаратура',
            'Фильтры гидравлические',
            'Картриджная аппаратура',
            'Измерительная аппаратура',
            'Гидроцилиндры',
            'Быстроразъемные соединения БРС',
            'Редукторы и мультипликаторы',
            'Маслоохладители',
            'Гидропневмо-аккумуляторы',
            'Дистанционное управление',
            'Электроника и автоматика',
            'Сопутствующие товары',
            'РВД',
        ];

        $insert_array = [];

        $index = 1;
        foreach($categories as $cat) {
            $item['title'] = $cat;
            $item['slug'] = \Illuminate\Support\Str::slug($cat);
            $item['image'] = 'public/uploads/products-categories/category' . $index . '.png';
            $item['category_id'] = '00000000-0000-0000-0000-000000000000';
            $item['parent'] = NULL;
            $item['created_at'] = now();
            $item['updated_at'] = now();

            $index++;

            $insert_array[] = $item;
        }

        return \App\Models\ProductCategory::insert($insert_array);
    }

    public function insert_products()
    {
        $products = \App\Models\Product::all();

        $insert_array = [];

        foreach($products as $product) {
            $item['product_id'] = $product->product_id;
            $mt_rand = mt_rand(0, 10);
            $item['image'] = $mt_rand == 1 ? 'public/uploads/products/no-photo.jpg' : 'public/uploads/products/' . mt_rand(0, 10) . '.jpg';
            $rand = mt_rand(0, 10);
            $item['hit'] = $rand == 0 ? 1 : NULL;
            $item['special_offer'] = $rand == 1 ? 1 : NULL;
            $item['created_at'] = now();
            $item['updated_at'] = now();

            $insert_array[] = $item;
        }

        return \App\Models\ProductContent::insert($insert_array);
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
        $products = \App\Models\Product::where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                        ->select('slug')
                                        ->get();

        return response()
                ->view('sitemap', compact('products'))
                ->header('Content-Type', 'text/xml');
    }
}
