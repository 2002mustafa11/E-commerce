<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{

    // public function index(Category $category_id = null)
    // {
    //     if ($category_id) {
    //         $categories = Category::where('category_id', $category_id->id)
    //             ->with('products')
    //             ->whereNotNull('category_id')
    //             ->select('id', 'name')
    //             ->get();
    //         if ($categories[0]) {
    //                 // dd($categories);
    //             $id = [];
    //             foreach ($categories as $key => $category) {
    //                 $id[] = $category->id;
    //             }
    //             $products = Product::where('category_id',$id)->paginate(24);
    //         }else {
    //             $products = $category_id->Products()->paginate(24);
    //         }

    //     } else {
    //         $products = Product::latest()->paginate(24);
    //         $categories = Category::where('category_id', null)->select('id', 'name')->get();
    //     }
    //         // dd($products);
    //     return view('market.shop', compact('products', 'categories'));
    // }
    public function index(Category $category_id = null)
    {
        $categories = Category::where('category_id', $category_id ? $category_id->id : null)
            ->with('products')
            ->select('id', 'name')
            ->get();

        if ($category_id && $categories->isEmpty()) {
            $products = $category_id->products()->paginate(24);
        } else {
            $categoryIds = $categories->pluck('id')->toArray();
            $products = Product::whereIn('category_id', $categoryIds)->latest()->paginate(24);
        }

        return view('market.shop', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', "%{$keyword}%")->paginate(24);
        // dd($products);
        return view('market.shop', compact('products'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $product = Product::findOrFail($id);
        $products = Product::where('category_id', $product->category_id)->paginate(12);
        return view('market.product-single', compact('product', 'products'));
    }






}

