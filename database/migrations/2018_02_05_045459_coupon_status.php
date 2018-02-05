<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CouponStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Coupon_id');
            $table->integer('Member_id');
            $table->string('status');
        });
    }
    public function down()
    {
        Schema::dropIfExists('coupon_status');
    }
}
