<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'name',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public static function get($id)
    // {
    //     $setting = new self();
    //     $entry = $setting->where('user_id', $id)->first();
    //     if (!$entry) {
    //         return;
    //     }
    //     return $entry->value;
    // }
}
