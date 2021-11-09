<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'vehicle_id',
        'user_id',
        'message',
        'status'
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle()
    {
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
