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
            $table->integer('S_id');
            $table->integer('Cate_id');
            $table->string('P_title');
            $table->string('P_content');
//            $table->string('P_picture');
            $table->binary('P_picture')->nullable();
            $table->dateTime('P_timestamp');
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
