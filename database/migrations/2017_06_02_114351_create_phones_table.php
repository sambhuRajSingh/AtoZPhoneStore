<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255);
            $table->string('make', 50);
            $table->string('model', 255);
            $table->string('name', 255);
            $table->string('type', 4);
            $table->string('tar_code', 50);
            $table->string('tar_name', 255);
            $table->integer('tar_minutes')->unsigned();
            $table->integer('tar_sms')->unsigned()->nullable();
            $table->integer('tar_data')->unsigned()->nullable();
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
        Schema::dropIfExists('phones');
    }
}
