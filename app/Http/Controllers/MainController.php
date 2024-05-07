<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

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

    /**
     * Подкатегории с много запросов к БД
     */
    /*
    public function category_t(string $cat = null, string $subcat1 = null, string $subcat2 = null)
    {
        $ct_title = "";
        $subcategories = collect();

        // Категория
        if ($cat) {
            $category = \App\Models\ProductCategory::where('slug', $cat)
                                                    // ->with('categories')
                                                    ->first();

            if ($category) {

                $ct_title = $category->title;
                $subcategories = $category->categories;

            } else {
                return abort(404);
            }
        }

        // Подкатегория subcat1
        if ($subcat1) {
            $subcategory1 = \App\Models\ProductSubCategory::where('slug', $subcat1)->first();

            // Проверка что эта подкатегория от этой категории через отношения
            $parent1 = \App\Models\ProductCategory::where('slug', $cat)
                                                    ->whereHas('categories', function($query) use ($subcat1) {
                                                        $query->where('slug', $subcat1);
                                                    })
                                                    ->first();

            if ($parent1) {

                $ct_title = $subcategory1->title;
                $subcategories = $subcategory1->childrencategories;

            } else {
                return abort(404);
            }
        }

        // Подкатегория subcat2
        if ($subcat2) {
            $subcategory2 = \App\Models\ProductSubCategory::where('slug', $subcat2)->first();

            // Проверка что эта подкатегория от этой подкатегории
            $parent2 = \App\Models\ProductCategory::where('slug', $cat)
                                                    ->whereHas('categories', function($query) use ($subcat2) {
                                                        $query->whereHas('childrencategories', function($query2)  use ($subcat2) {
                                                            $query2->where('slug', $subcat2);
                                                        });
                                                    })
                                                    ->first();

            if ($parent2) {

                $ct_title = $subcategory2->title;
                
            } else {
                return abort(404);
            }
        }

        // products - товары
        // ct_title - название категории/подкатегории
        // subcategories - подкатегории в этой категории

        $products = \App\Models\Product::where('category_id', $category->category_id)
                                                ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                                ->paginate(24);

        return view('category', compact('products', 'ct_title', 'subcategories'));
    }
    */

    public function test_t(Request $request, Category $subcat1 = null, Category $subcat2 = null, Category $subcat3 = null)
    {
        // return (new \App\Services\MainCategory())->set_main_category();
        // return (new \App\Services\MainCategory())->set_main_category_and_image();
        // return (new \App\Services\ParseXml())->parse();
        
        if ($subcat3) {
            $categories = Category::descendantsAndSelf($subcat3->id)->toTree();
            return view('test-subcat', compact('categories'));
        }

        if ($subcat2) {
            $categories = Category::descendantsAndSelf($subcat2->id)->toTree();
            return view('test-subcat', compact('categories'));
        }

        if ($subcat1) {
            $categories = Category::descendantsAndSelf($subcat1->id)->toTree();
            return view('test-subcat', compact('categories'));
        }

        // if (!$subcat3 && !$subcat2 && !$subcat1) {
        //     dd($subcat1, $subcat2, $subcat3);
        //     $categories = Category::all()->toTree();
        //     return view('test-subcat', compact('categories'));
        // }

        return redirect()->route("home");
    }

    public function category_t(string $cat = null, string $subcat1 = null, string $subcat2 = null)
    {
        $ct = "";
        $subcategories = "";
        
        // Категория
        if ($cat) {

            // Получаю категорию и ее подкатегории все вложения
            $category = \App\Models\ProductCategory::where('slug', $cat)
                                                    ->with('subcategories')
                                                    ->first();
            
            if ($category) {
                $ct = $category;
                $subcategories = $category->categories;
            } else {
                return abort(404);
            }
        }

        // Подкатегория subcat1
        if ($subcat1) {

            // Ищу в $subcategories подкатегорию с таким slug
            $has_subcategory = false;
            $subcategory = "";
            foreach($subcategories as $sbc) {
                if ($subcat1 == $sbc->slug) {
                    $has_subcategory = true;

                    $ct = $sbc;
                    $subcategory = $sbc;
                    $childrencategories = $sbc->childrencategories;
                }
            }

            // Если не найдено, то подкатегория не от этой категории
            if (!$has_subcategory) {
                return abort(404);
            }

            // $products = \App\Models\Product::where('category_id', $category->category_id)
            //                                 ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
            //                                 ->paginate(24);

            // return view('subcategory', compact('category', 'ct', 'products', 'subcategory', 'childrencategories'));

        }

        // Подкатегория subcat2
        if ($subcat2) {
            // Категория РВД
            if ($category->id == 19) {
                dd("ok");
            } else {
                return abort(404);
            }
        }

        $products = \App\Models\Product::where('category_id', $category->category_id)
                                        ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                        ->paginate(24);

        return view('category', compact('category', 'ct', 'products', 'subcategories'));
    }


    public function category_v(string $cat = null, string $subcat1 = null, string $subcat2 = null)
    {
        $ct_title = "";

        // Категория
        if ($cat) {
            $category = \App\Models\ProductCategory::where('slug', $cat)->first();

            if ($category) {

                $ct_title = $category->title;

                /*
                // Подкатегории
                $subcategories = $category->subcategories;

                // Объединение главной категории и ее подкатегорий в одну коллекцию
                $categories = $category->subcategories->shuffle(); // shuffle нужен чтобы создать новую коллекцию
                $categories = $categories->push($category);

                // Массив с category_id
                $cats = [];

                foreach($categories as $cat) {
                    $cats[] = $cat->category_id;
                }

                // Товары из главной категории и ее подкатегорий
                $products = \App\Models\Product::whereIn('category_id', $cats)
                                                ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                                ->paginate(24);

                return view('category', compact('products', 'category', 'subcategories'));
                */
            } else {
                return abort(404);
            }
        }

        // Подкатегория subcat1
        if ($subcat1) {
            $subcategory1 = \App\Models\ProductSubCategory::where('slug', $subcat1)->first();

            if ($subcategory1) {

                // Проверка что это подкатегория дочерняя для категории
                // У нее parent_category_id == category_id
                if ($subcategory1->parent_category_id == $category->category_id) {

                    $ct_title = $subcategory1->title;

                } else {
                    return abort(404);
                }

            } else {
                return abort(404);
            }
        }

        // Подкатегория subcat2
        if ($subcat2) {
            $subcategory2 = \App\Models\ProductSubCategory::where('slug', $subcat2)->first();

            if ($subcategory2) {

                // Проверка что это подкатегория2 дочерняя для подкатегории
                // У нее parent_category_id == category_id
                if ($subcategory2->parent_category_id == $subcategory1->parent_category_id) {

                    $ct_title = $subcategory2->title;

                } else {
                    return abort(404);
                }
                
            } else {
                return abort(404);
            }
        }

        // products - товары
        // ct_title - название категории/подкатегории
        // subcategories - подкатегории в этой категории
        dd($ct_title);
        return view('category', compact('ct_title'));
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
            $products = \App\Models\Product::whereIn('category_id', $cats)
                                            ->where('category_id', '<>', '00000000-0000-0000-0000-000000000000')
                                            ->paginate(24);

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
            $subcategory = \App\Models\ProductSubCategory::where('slug', $subcat)->first();

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

        if (mb_strlen($search_query) < 3 || mb_strlen($search_query) > 30) {
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


    // temp
    public function images(): View
    {
        $products = collect();

        $all_products = Product::with('content')->get();

        foreach($all_products as $product) {
            if($product->content) {
                if($product->content->image) {
                    $products->push($product);
                }
            }
        }
        
        $products = $products->paginate(20);

        return view('temp-images', compact('products'));
    }

    public function parse_xml_test()
    {
        return (new \App\Services\ParseXml())->parse();
        // return view('phpinfo');
    }

}
