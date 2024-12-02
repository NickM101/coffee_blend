<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'image',
        'user_id',
        'updated_at',
        'created_at'
    ];

    public $timestamps = true;

}
