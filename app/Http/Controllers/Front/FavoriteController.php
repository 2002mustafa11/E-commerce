<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite_product;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();

        $products = $user->favoriteProducts()
        ->select('products.name', 'products.image', 'products.discount_price','favorite_products.id')
        ->get();
        
        return view('market.favorite',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'numeric',
        ]);

        $user = auth()->id();
        $favorite = Favorite_product::where('user_id', $user)
                ->where('product_id', $request->product_id)
                ->first();

        if ($favorite) {
            return redirect()->back()->with('success','The product already exists');
        }

        Favorite_product::create([
        'user_id' => $user,
        'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('success','The product has been added to favorites');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite_product $product_id)
    {
        $product_id->delete();
        return redirect()->back();
    }
}
