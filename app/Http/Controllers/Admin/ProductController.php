<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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
    public function edit(string $id): View
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
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:250',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(50)
                                                                    ->max(5 * 1024)
                                ],
            'input-gallery-file' => 'nullable|max:4',
            'input-gallery-file.*' => [
                                    \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                        ->min(50)
                                                                        ->max(5 * 1024)
                                    ],
            'delete_gallery' => 'nullable|numeric',
        ]);

        $product = Product::findOrFail($id);

        // Обновление изображения
        if (array_key_exists('input-main-file', $validated)) {
            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $path = Storage::putFile('public/uploads/products', $validated["input-main-file"]);
        } else {
            $path = $product->image;
        }

        $product->update([
            'image' => $path,
        ]);

        // Обновление галереи
        if (array_key_exists('input-gallery-file', $validated)) {
            // Удаление галереи
            foreach ($product->gallery as $gl) {
                // Удаление файлов
                if (Storage::exists($gl->image)) {
                    Storage::delete($gl->image);
                }
                // Удаление модели
                $gl->delete();
            }

            // Вставка новых файлов и моделей
            $gallery_array = [];

            foreach ($validated['input-gallery-file'] as $value) {
                $item = [];
                $item["product_id"] = $product->id;
                $item["image"] = Storage::putFile('public/uploads/products-galleries', $value);
                $item["created_at"] = now();
                $item["updated_at"] = now();
                $gallery_array[] = $item;
            }

            ProductGallery::insert($gallery_array);
        }

        // Удаление галереи
        if (array_key_exists('delete_gallery', $validated)) {
            foreach($product->gallery as $gl) {
                // Удаление файлов
                if (Storage::exists($gl->image)) {
                    Storage::delete($gl->image);
                }
                // Удаление модели
                $gl->delete();
            }
        }

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
