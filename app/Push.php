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
        'Product_id',
        'discount',
        'content',
        'statue',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];}