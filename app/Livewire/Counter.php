<?php

namespace App\Livewire;

use App\Models\Favorite_product;

use Livewire\Component;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class Counter extends Component
{
    public $product_id;
    public $product_image;
    public $product_quantity;
    public $product_price;
    public $product_name;
    public $product;


    public function favorite()
    {
        // dd( );
        $user = auth()->id();

        if (!isset($user) ) {
            return redirect()->route('login');
        }
        $favorite = Favorite_product::where('user_id', $user)
                ->where('product_id', $this->product_id)
                ->first();

        if ($favorite) {
            return ;
        }

        Favorite_product::create([
        'user_id' => $user,
        'product_id' => $this->product_id,
        ]);
        $this->dispatch('success');
    }

    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $this->product_id,
            'name' => $this->product_name,
            'price' => $this->product_price,
            'qty' => $request->quantity ?? 1,
            'options' => ['image' => $this->product_image],
        ])->associate('App\Models\Product');
        // session()->increment('Cart');
        session(['Cart' => Cart::count()]);
        $this->dispatch('qtyCart');

    }

    // return redirect()->back();
    public function render()
    {
        // return redirect()->back()->with('success','The product has been added to favorites');
        return view('livewire.counter');

    }
}
