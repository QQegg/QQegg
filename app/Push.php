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
        'datetime'
    ];}