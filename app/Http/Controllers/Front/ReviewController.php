<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request,$review,$id)
    {

        // $product_id = $request->input('product_id');
        // $review = $request->input('review');

        Review::create([
            'product_id' => $review,
            'review' => $id,
        ]);


        return response()->pack();
    }
}
