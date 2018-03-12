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
    protected $table='transaction';
    protected $fillable=[

        'id',
        'Store_id',
        'Member_id',
        'Coupon_id',
        'commodity_id',
        'number',
        'timestamp',
    ];
}
 class categorylist extends Model{
    protected $table='transaction_CandN';
    protected $fillable=[
        'id',
        'commodity_id',
        'number',
    ];
 }