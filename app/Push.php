<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Push extends Model
{
    protected $table='pushs';
    protected $fillable=['id','S_id','C_id','Cate_id','P_title','P_content','P_picturet','P_timestamp'];}