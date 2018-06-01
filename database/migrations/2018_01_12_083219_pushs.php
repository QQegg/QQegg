<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pushs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pushs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Store_id');
            $table->integer('Commodity_id');
            $table->string('title');
            $table->string('content');
            $table->integer('statue')->default(0);
            $table->string('date_start')->nullable();
            $table->string('date_end')->nullable();
            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('pushs');
    }
}
