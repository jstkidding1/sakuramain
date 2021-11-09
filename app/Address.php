<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'contact_num',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
