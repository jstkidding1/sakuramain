<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_id',
        'date',
        'time',
        'contact_num',
        'address',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
    
}
