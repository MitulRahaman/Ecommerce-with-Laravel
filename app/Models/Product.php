<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'category' => 'array'
    ];

    protected $fillable = ['code', 'name', 'price', 'category', 'photo', 'user_id'];

}

