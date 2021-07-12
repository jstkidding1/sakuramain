<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
// use App\Reservation;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    
    protected $fillable = [
        'fname', 'mname', 'lname', 'email', 'password',
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
}
