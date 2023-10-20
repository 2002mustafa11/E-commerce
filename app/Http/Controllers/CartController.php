<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::instance()->content();
        // dd($carts);
        return view('market.cart', compact('carts'));
    }

    public function store(Request $request, Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->discount_price,
            'qty' => $request->quantity ?? 1,
            'options' => ['image' => $product->image,],
            ])->associate('App\Models\Product');
            session(['Cart' => Cart::count()]);

        return redirect()->back();
    }

    public function update(Request $request,$rowId)
    {
        // dd();
        if ($request->Plus) {
            Cart::update($rowId,$request->Plus );
        }elseif ($request->minus) {
            Cart::update($rowId,$request->minus );
        }
        session(['Cart' => Cart::count()]);

        return redirect()->back();
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        // session()->decrement('Cart');
        session(['Cart' => Cart::count()]);
        return redirect()->back();
    }
}
