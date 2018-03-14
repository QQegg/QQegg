<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
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
