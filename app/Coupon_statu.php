<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon_statu extends Model
{
    protected $table='coupon_status';
    protected $fillable=[

        'id',
        'Coupon_id',
        'Member_id',
        'status',
    ];
}
