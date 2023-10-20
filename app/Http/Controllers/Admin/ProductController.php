<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Http\traits\UploadFile;
use App\Models\Category;

class ProductController extends Controller
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('category:name as category')->latest()->paginate(10);
        // dd($products);
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            ->latest('products.created_at')
            ->paginate(10);
        return view('Admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys=Category::get();
        return view('Admin.Product.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename=$this->UploadImage($image,'market/images/product');
        }

        Product::create([
            'name' => $request->name,
            'image' => $filename,
            'category_id' => $request->category,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price ?? '',
            'quantity' => $request->quantity,
            'offer' => $request->offer ?? '0',
        ]);
        return redirect()->back()->with('success', 'Product success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorys=Category::get();
        return view('Admin.product.edit',compact('product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image'))
        {
            if ($product->image) {
                $this->DeleteImage($product->image,'/market/images/product/');
            }
            $filename=$this->UploadImage($request->image,'market/images/product');
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
            'quantity' => $request->quantity,
            'image' => $filename??$product->image,
            'offer' => $request->offer,
            ]);
        return redirect()->route('dashboard.product.index')->with('success', 'Product update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $this->DeleteImage($product->image,'/market/images/product/');

        }
        $product->delete();
        return redirect()->route('dashboard.product.index')->with('success', 'Product destroy success');
    }
}
