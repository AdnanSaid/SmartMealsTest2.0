<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // a simple string
            $table->string('preptime');
            $table->mediumText('description'); //medium height text
            $table->mediumText('ingredients');
            $table->longText('preparation');// long height text
            $table->string('cover'); // this is for the image, we just want the name as a string
            $table->timestamps();

            $table->unsignedBigInteger('user_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
