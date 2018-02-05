<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupons';
    protected $fillable=[

        'id',
        'S_id',
        'Coup_title',
        'Coup_content',
        'Coup_start',
        'Coup_end',
        'Coup_picture'

    ];}