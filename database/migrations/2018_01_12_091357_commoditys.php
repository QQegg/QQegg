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
            $table->integer('Category_id');
            $table->integer('store_id');
            $table->string('name');
            $table->string('specification');
            $table->integer('price');
            $table->string('picture');
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
