<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_push extends Model
{
    protected $fillable=[
        'id',
        'Store_id',
        'User_id',
        'Push_id',
        'use_status'
    ];

    protected $table="user_pushs";
}
