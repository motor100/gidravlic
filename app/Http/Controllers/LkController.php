<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class LkController extends Controller
{
    public function home(): mixed
    {
        // Пользователь
        $user = Auth::user();

        // Если пользователя нет, то редирект на главную
        if (!$user) {
            return redirect('/');
        }

        // Заказы
        $orders = Order::where('user_id', $user->id)->paginate(20);

        return view('lk.home', compact('orders'));
    }

    public function order($id): mixed
    {
        // Пользователь
        $user = Auth::user();

        // Заказ
        $order = Order::findOrFail($id);

        // Если пользователя и заказа нет, то редирект на главную
        if (!$user || !$order) {
            return redirect('/');
        }

        return view('lk.order', compact('order'));
    }
}
