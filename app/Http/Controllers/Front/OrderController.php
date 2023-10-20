<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user=(auth()->user());
        // dd(!isset($user));

        if (!isset($user) || Cart::count()<= 0) {
            return redirect()->route('login');
        }
            return view('market.checkout',compact('user'));
    }



    public function store(Request $request)
    {

        if (!session('Cart')) {
            return redirect()->route('cart')->with('success', 'no');
            exit;
        }
        DB::transaction(function () use ($request) {

        $user = Auth::user();
        $request->validate([
            'street' => 'required',
            'appartment' => 'required',
            'phone' => 'required|regex:/^01[0-9]{9}$/'
        ]);
        $subtotal = Cart::subtotal();
        $order = Order::create([
            'user_id' => $user->id,
            'order_code' => uniqid(),
            'total' => $subtotal,
            'address' => $request->street.'/'.$request->appartment,
        ]);

        $user->update([
        'phone' => $request->phone,
        ]);

        $carts = Cart::instance()->content();

        $orderProducts = $carts->map(function ($cartItem) use ($order) {
            return [
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'total' => $cartItem->price * $cartItem->qty,
            ];
        })->toArray();

        OrderProduct::insert($orderProducts);
        Cart::destroy();

        // session()->forget('Cart');
        session(['Cart' => Cart::count()]);
    });

        return redirect()->route('show.cart')->with('success', 'The order was completed successfully');
    }


}
