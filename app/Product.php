<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'id',
        'Cate_id',
        'Comm_name',
        'Comm_spec',
        'Comm_price',
        'Comm_unit',
        'Comm_inv',
    ];

    protected $table="commoditys";
}
