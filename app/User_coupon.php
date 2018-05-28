<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_coupon extends Model
{
    protected $fillable=[
        'id',
        'Store_id',
        'User_id',
        'name',
        'use_status'
    ];

    protected $table="user_coupons";
}
