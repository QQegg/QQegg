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
        'unit',
        'inventory',
        'picture',
    ];

    protected $table="commoditys";
}
