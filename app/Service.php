<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'service_name',
        'description',
        'image'
    ];

    public function appointments() {
        return $this->hasMany(Appointments::class);
    }
}
