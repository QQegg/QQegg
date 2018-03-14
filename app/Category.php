<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'id',
        'store_id',
        'name',
    ];

    protected $table="categorys";
}
