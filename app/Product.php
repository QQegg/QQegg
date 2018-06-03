<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'id',
        'Category_id',
        'store_id',
        'name',
        'specification',
        'price',
        'picture',
    ];

    protected $table="commoditys";
}
