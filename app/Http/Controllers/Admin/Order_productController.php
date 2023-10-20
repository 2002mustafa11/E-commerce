<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class Order_productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->where('status','1')->get();
        // dd($orders);
        return view('Admin.orders.index',compact('orders'));
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
//     public function show(Order $order)
// {
//     $order->with('orderProducts', 'user')->get('address');

//     $Products = $products = $order->orderProducts->pluck('product');
//     $user = $order->user;
//     $address = $order->address;

//     return view('Admin.orders.show', compact('products', 'user', 'address'));
// }


public function show(Order $order)
{
    $order->with('orderProducts', 'user')->get('address');
    $products = $order->orderProducts()
        ->join('products', 'order_products.product_id', '=', 'products.id')
        ->select('products.name', 'products.image','order_products.total','order_products.quantity','order_products.created_at')
        ->get();
        // dd($products);
    $user = $order->user;
    $address = $order->address;
    $created_at = $order->created_at;

    return view('Admin.orders.show', compact('products', 'user', 'address','created_at'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $orderProducts = $order->orderProducts()->with('product')->get();

        foreach ($orderProducts as $orderProduct) {
            // dd($orderProduct);
            $product = $orderProduct->product;
            $currentQuantity = $product->quantity;
            $newQuantity = $currentQuantity - $orderProduct->quantity;
            $currentSold = $product->sold;
            $newSold = $currentSold + $orderProduct->quantity;

            $product->update([
                'quantity' => $newQuantity,
                'sold' => $newSold,
            ]);
        }
        $order->update([
            'status' => '0',
        ]);
        ;
        // Product::update([

        // ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
