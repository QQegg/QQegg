<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Push extends Model
{
    protected $table='pushs';
    protected $fillable=[
        'id',
        'Store_id',
        'Commodity_id',
        'title',
        'discount',
        'statue',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];}