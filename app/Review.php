<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'name',
        'email',
        'comments'
    ];

    public function vehicle()
    {
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
