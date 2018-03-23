<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealmatch extends Model
{
    protected $table='dealmatchs';
    protected $fillable=[
        'id',
        'Tran_id',
        'Commodity_id',
        'number',
    ];

}
