<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }
    
    public function profile()
    {
        $admin = Auth::guard('admin')->user();

        return view('dashboard.profile', compact('admin'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile', [
            'user' => Auth::guard('admin')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('admin.profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /*
    public function orders()
    {
        $orders = \App\Models\Order::orderBy('id', 'desc')
                                    ->limit(200)
                                    ->get();
        
        $orders = \App\Services\Common::custom_paginator($orders, 50);

        return view('dashboard.orders', compact('orders'));
    }

    public function orders_show($id)
    {
        $order = \App\Models\Order::findOrFail($id);

        $order->phone = \App\Services\Common::int_to_phone($order->phone);

        // Получаю модель CdekOrder по номеру заказа
        $cdek_order = \App\Models\CdekOrder::where('order_id', $id)->first();

        $is_waybill = false;

        // Если есть модель СdekOrder с таким order_id
        if ($cdek_order) {
            // Сравниваю updated_at с текущей датой и получаю разницу в минутах
            $diff_minutes = $cdek_order->updated_at->diffInMinutes(now());

            // 3 минуты - время на формирование квитанции
            // 60 минут - ссылка на файл с квитанцией действует 1 час
            if ($diff_minutes > 3 && $diff_minutes < 60) {
                $is_waybill = true;
            }
        }

        return view('dashboard.order', compact('order', 'is_waybill'));
    }

    public function order_update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $comment = $request->input('comment');

        $now = date('Y-m-d H:i:s');

        \App\Models\Order::where('id', $id)
                        ->update([
                            'status' => $status,
                            'comment' => $comment,
                            'updated_at' => $now
                        ]);

        return redirect('/admin/orders');
    }

    public function order_print($id)
    {   
        $order = \App\Models\Order::findOrFail($id);

        $products = (new \App\Services\ProductSort($order))->get();

        return view('dashboard.order-print', compact('id', 'products'));
    }

    public function order_check($id)
    {
        $order = \App\Models\Order::findOrFail($id);

        $products = (new \App\Services\ProductSort($order))->get();

        $total = [
            "quantity" => 0,
            "summ" => 0
        ];

        foreach($products as $product) {
            // Расчет количества всех товаров
            $total["quantity"] += $product->pivot->quantity;
            // Расчет суммы всех товаров
            $total["summ"] += $product->summ;
        }

        return view('dashboard.order-check', compact('id', 'products', 'total'));
    }
    */
}
