<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'delivery_option',
        'region',
        'province',
        'city',
        'barangay',
        'postal_code',
        'street_name',
        'building',
        'house_num',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
