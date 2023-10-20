<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\traits\UploadFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFile;

    public function index()
    {
        $categories = Category::withCount('products')->latest()->paginate(10);
        return view('Admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys=Category::get();
        return view('Admin.category',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename=$this->UploadImage($image,'market/images/category');
        }

        Category::create([
            'image' => $filename,
            'name' => $request->name,
            'category_id' => $request->category,
            'description' =>'description'

        ]);
        return redirect()->back()->with('success', 'create success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products;
        return view('Admin.category',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categorys=Category::get();
        return view('Admin.category',compact('category','categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        if ($request->hasFile('image'))
        {
            if ($category->image) {
                $this->DeleteImage($category->image,'/market/images/category/');
            }
            $filename=$this->UploadImage($request->image,'market/images/category');
        }
        $category->update([
            'image' => $filename??$category->image,
            'name' => $request->name
        ]);
        return redirect('dashboard/category')->with('success', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            $this->DeleteImage($category->image,'/market/images/category/');

        }
        $category->delete();
        return redirect('dashboard/category')->with('success', 'destroy success');
    }
}
