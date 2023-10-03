<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search_query = $request->input('search_query');

        $products = collect();

        if($search_query) {
            $search_query = htmlspecialchars($search_query);
            $products = Product::where('title', 'like', "%{$search_query}%")->get();
        } else {
            $products = Product::orderBy('id', 'desc')->limit(20)->get();
        }

        return view('dashboard.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        // $category = \App\Models\Category::where('count_children', 0)->get();

        // $current_category = $category->where('id', $product->category_id)->first();

        // return view('dashboard.products-edit', compact('product', 'category', 'current_category'));
        return view('dashboard.products-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
