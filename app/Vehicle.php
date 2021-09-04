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
        'features',
        'vehicle_overview',
        'price',
        'thumbnail',
        'image',
        'status',
    ];

    public function reservations(){
        return $this->hasMany(Reservations::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
