<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; // bo nie używamy dat
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'brand_id', 'is_active'
    ];
}