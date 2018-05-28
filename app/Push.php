<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Push extends Model
{
    protected $table='pushs';
    protected $fillable=[
        'id',
        'Store_id',
        'title',
        'content',
        'statue',
        'picture',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];}