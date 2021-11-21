<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
    ];

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class)->withTrashed();
    }
}
