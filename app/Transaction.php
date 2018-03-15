<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='transactions';
    protected $fillable=[
        'id',
        'Store_id',
        'Member_id',
        'Coupon_id',
        'date',
    ];
}
