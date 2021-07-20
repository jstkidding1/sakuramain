<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_brand',
        'product_model',
        'description',
        'units',
        'image',
        'price'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
