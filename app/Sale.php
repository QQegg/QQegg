<?php
/**
 * Created by PhpStorm.
 * User: SKILL573
 * Date: 2018/3/3
 * Time: 上午 11:39
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
class Sale extends Model
{
    protected $table='pushs';
    protected $fillable=[
        'id',
        'S_id',
        'Cate_id',
        'P_title',
        'P_content',
        'P_picture',
        'P_timestamp'
    ];
}