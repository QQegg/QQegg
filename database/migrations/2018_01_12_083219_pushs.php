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
            $table->string('title');
            $table->string('content');
            $table->string('picture');
//            $table->binary('P_picture')->nullable();
            $table->dateTime('datetime');
<<<<<<< HEAD
=======
            $table->integer('S_id');
            $table->integer('Cate_id');
            $table->string('P_title');
            $table->string('P_content');
            $table->string('P_picture');
//          $table->binary('P_picture')->nullable();
            $table->dateTime('P_timestamp');
>>>>>>> 7202721f6913e2b9b76d30a92c50a07db4d56a14
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
