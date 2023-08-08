<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function products_search(Request $request): JsonResponse
    {
        $search_query = $request->input('search_query');

        if (!$search_query) {
            return response()->json([]);
        }

        $search_query = htmlspecialchars($search_query);

        $products = \App\Models\Product::where('title', 'like', "%{$search_query}%")
                                        ->select('title', 'slug')
                                        ->get();

        return response()->json($products);
    } 
}
