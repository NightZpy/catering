<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeUtensilPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_utensil', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->integer('utensil_id')->unsigned()->index();
            $table->foreign('utensil_id')->references('id')->on('utensils')->onDelete('cascade');
            $table->primary(['recipe_id', 'utensil_id']);
            $table->integer('quantity')->default(0);
            //$table->primary(['utensil_id', 'base_recipe_id']);
            $table->unique(['utensil_id', 'recipe_id'], 'recipe_utensil_unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_utensil');
    }
}
