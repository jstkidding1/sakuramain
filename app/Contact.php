<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fname',
        'lname',
        'address',
        'contact_num',
        'message',
        'image'
    ];

}
