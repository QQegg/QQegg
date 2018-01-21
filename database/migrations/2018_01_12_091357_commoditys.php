<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Commoditys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commoditys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cate_id');
            $table->string('Comm_name');
            $table->string('Comm_spec');
            $table->integer('Comm_price');
            $table->string('Comm_unit');
            $table->integer('Comm_inv');
            $table->string('Comm_img');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commoditys');
    }
}
