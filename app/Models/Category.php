<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function Categories()
    {

        return $this->hasMany(Category::class, 'category_id');
    }
}
        // $category = Category::where('category_id', $this->id)->get();
        // dd($category);
