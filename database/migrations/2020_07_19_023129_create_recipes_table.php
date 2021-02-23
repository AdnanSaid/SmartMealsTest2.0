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
            $table->BigIncrements('id');
            $table->string('title'); // a simple string
            $table->mediumText('description'); //medium height text
            $table->string('image'); // this is for the image, we just want the name as a string
            $table->string('prep_time');
            $table->string('cook_time');
            $table->string('servings');
            $table->string('difficulty');
            $table->string('calorie');
            $table->string('fat');
            $table->string('saturates');
            $table->string('carbs');
            $table->string('sugars');
            $table->string('fibre');
            $table->string('protein');
            $table->string('salt');
            $table->mediumText('ingredients');
            $table->longText('steps');// long height text
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subcategories_id');
            $table->unsignedBigInteger('categories_id');

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
