<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    
    protected $fillable = [
        'fname', 'mname', 'lname', 'email', 'password', 'status', 'image'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
