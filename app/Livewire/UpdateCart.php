<?php

namespace App\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCart extends Component
{
    // public $carts;
    // // public $qty;
    // // public $rowId;
    // // public $image;
    // // public $name;
    // public function updatePlus($Plus)
    // {
    //     dd($this->qty);
    //     // dd($Plus);
    //     Cart::update($this->rowId,$Plus );
    //     session(['Cart' => Cart::count()]);
    //     $this->dispatch('qtyCart');
    // }
    // public function updateMinus($minus)
    // {
    //     // dd($minus);
    //     Cart::update($this->rowId,$minus );
    //     session(['Cart' => Cart::count()]);
    //     $this->dispatch('qtyCart');
    // }
    // public function render()
    // {
    //     return view('livewire.update-cart');
    // }
    public $quantity;

public function updatePlus($rowId)
{
    // dd($rowId);
    $product = Cart::get($rowId);
    $newQty = $product->qty + 1;
    Cart::update($rowId, $newQty);
    session(['Cart' => Cart::count()]);
    $this->dispatch('qtyCart');
}

public function updateMinus($rowId)
{
    // dd($rowId);
    $product = Cart::get($rowId);
    $newQty = $product->qty - 1;
    if ($newQty < 1) {
        $newQty = 1;
    }
    Cart::update($rowId, $newQty);
    session(['Cart' => Cart::count()]);
    $this->dispatch('qtyCart');
}
public function remove($rowId)
    {
        Cart::remove($rowId);
        session(['Cart' => Cart::count()]);
        $this->dispatch('qtyCart');
    }
public function render()
{
    $carts = Cart::instance()->content();
    return view('livewire.update-cart', compact('carts'));
}
}
