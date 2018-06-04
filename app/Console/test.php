<?php
/**
 * Created by PhpStorm.
 * User: SKILL573
 * Date: 2018/6/4
 * Time: 下午 08:43
 */

use App\Push;
use Carbon\Carbon;

$test=Push::all()->where('date_end','<=',Carbon::now()->toDateString())->pluck('id');
foreach ($test as $qq)
{
    $push=Push::find($qq);
    $push->delete();
}


