<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseRecipeRecipePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_recipe_recipe', function (Blueprint $table) {
            $table->integer('base_id')->unsigned()->index();
            $table->foreign('base_id')->references('id')->on('base_recipes')->onDelete('cascade');
            $table->integer('recipe_id')->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->integer('required_quantity')->default(0);
            $table->primary(['base_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('base_recipe_recipe');
    }
}
