<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Reservation;

class Vehicle extends Model
{
    use SoftDeletes;
    
    protected $table = 'vehicles';

    protected $fillable = [
        'category_id',
        'brand_name',
        'year_model',
        'model_type',
        'body_type',
        'mileage',
        'fuel_type',
        'transmission',
        'drive_type',
        'color',
        'interior_color',
        'engine',
        'vehicle_overview',
        'price',
        'thumbnail',
        'image',
        'status',
    ];

    public function reservations(){
        return $this->hasMany(Reservations::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
