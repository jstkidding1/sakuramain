<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_id',
        'date',
        'time',
        'car_model',
        'plate_number',
        'engine_number',
        'chassis_number',
        'message',
        'status',
        'start_time',
        'end_time'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
    
}
