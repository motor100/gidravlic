<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        // Шаблон главной страницы
        view()->composer('layouts.main', function ($view) // прикрепить компоновщик к шаблону layouts.main
        {
            // Get parent categories
            // $categories = \App\Models\ProductCategory::all();

            // Get main category
            $categories = \App\Models\Category::all();

            $view->with('categories', $categories);

            // Get child categories
            /*
            foreach($parent_category as $pct) {
                $child_category = $categories->where('parent', $pct->id)->sortBy('sort');
                if ($child_category->count() > 0) {
                    $pct->child_category = $child_category;
                }
            }
            */


            // Count products in cart
            $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);

            if ($cart) {
                $cart_count = count($cart);
                $cart_count = $cart_count > 9 ? 9 : $cart_count;
                $view->with('cart_count', $cart_count);
            }

            // Products in cart
            if ($cart) {
                $keys = array_keys($cart);
                $products_in_cart = \App\Models\Product::whereIn('id', $keys)->get();
                foreach ($products_in_cart as $product) {
                    $product->quantity = $cart[$product->id];
                }
                $view->with('products_in_cart', $products_in_cart);
            }

            // Count products in favourites
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            if ($favourites) {
                $favourites_count = count($favourites);
                $favourites_count = $favourites_count > 9 ? 9 : $favourites_count;
                $view->with('favourites_count', $favourites_count);
            }

            // Count products in comparison
            $comparison = json_decode(\Illuminate\Support\Facades\Cookie::get('comparison'), true);

            if ($comparison) {
                $comparison_count = count($comparison);
                $comparison_count = $comparison_count > 9 ? 9 : $comparison_count;
                $view->with('comparison_count', $comparison_count);
            }

        });

        // Шаблон панели администратора
        view()->composer('dashboard.layout', function ($view)
        {
            // New testimonials
            $testimonials_count = \App\Models\Testimonial::whereNull('publicated_at')
                                                        ->count();

            $view->with('testimonials_count', $testimonials_count);

            // New orders
            $orders_count = \App\Models\Order::where('status', 'В обработке')->count();

            $view->with('orders_count', $orders_count);
        });

        // Шаблон личный кабинет
        /*
        view()->composer('profile.layout', function ($view)
        {
            // User
            $user = Auth::user();

            // Если пользователя есть, то 
            if ($user) {
                $office = \App\Models\Office::where('user_id', $user->id)->first();

                $view->with('office', $office);
            }
        });
        */
    }
}
