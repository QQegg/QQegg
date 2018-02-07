<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'id',
        'name',
        'contact',
        'account',
        'password',
        'phone',
        'address',
        'picture',
        'right',
        'expire',
    ];

    protected $table="stores";
}
