<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'date',
        'time',
        'message',
        'status',
        'remarks',
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle()
    {
    return $this->belongsTo(Vehicle::class, 'vehicle_id')->withTrashed();
    }
}
