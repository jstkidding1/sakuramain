<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'vehicle_id',
        'user_id',
        'contact_num',
        'address',
        'purchase_in',
        'financing_option',
        'car_loan_downpayment',
        'loan_duration',
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
