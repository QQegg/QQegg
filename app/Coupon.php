<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupons';
    protected $fillable=[

        'id',
        'Store_id',
        'title',
        'start',
        'end',
        'discount',
        'lowestprice',
        'picture',
        'status'
    ];}