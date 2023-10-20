<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'regular_price',
        'discount_price',
        'quantity',
        'sold',
        'offer',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
