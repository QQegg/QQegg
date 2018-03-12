<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Store_id');
            $table->integer('Member_id');
            $table->string('Coupon_id');
            $table->timestamps();
            $table->dateTime('expire');
            $table->rememberToken();
        });
        Schema::create('transaction_CandN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commodity_id');
            $table->string('number');
            $table->timestamps();
            $table->dateTime('expire');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
