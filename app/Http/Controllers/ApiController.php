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

    public function add_testimonial(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'text' => 'required|min:3|max:1000',
            'checkbox-agree' => 'required',
            'checkbox-read' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'error']);
        }

        $validated = $validator->validated();

        // Google Captcha
        $g_response = (new \App\Services\GoogleCaptcha($validated))->get();

        if (!$g_response) {
            return response()->json(['message' => 'error']);
        }

        $testimonial = \App\Models\Testimonial::create([
                    'name' => $validated["name"],
                    'email' => $validated["email"],
                    'text' => $validated["text"],
                    'publicated_at' => NULL
                ]);

        return response()->json($testimonial);
    }

}
