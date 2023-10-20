<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\App;



class HomeController extends Controller
{
    public function index()
    {
        if (!session()->exists('Cart')) {
            session(['Cart' => '0']);
        }
        $products=product::latest()->paginate(12);
        $products_offer=product::where('offer','1')->latest()->paginate(12);
        $categories = Category::limit(3)->get();
        $categories1 = Category::skip(3)->take(3)->get();
        // $categories = Category::with('products')->where('category_id',null)->select('id', 'name')->get();

        return view('market.index',compact('products','products_offer','categories','categories1'));
    }

    public function contact()
    {
        return view('market.contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Contact::create([
            'user_id' => auth()->id()??'',
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->route('home');
    }
}
