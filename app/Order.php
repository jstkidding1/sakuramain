<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'delivery_option',
        'remarks',
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
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
}
