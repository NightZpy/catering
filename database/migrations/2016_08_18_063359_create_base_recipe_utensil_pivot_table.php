<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaseRecipeUtensilPivotTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_recipe_utensil', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('base_recipe_id')->unsigned();
            $table->foreign('base_recipe_id')->references('id')->on('base_recipes')->onDelete('cascade');
            
            $table->integer('utensil_id')->unsigned();            
            $table->foreign('utensil_id')->references('id')->on('utensils')->onDelete('cascade');
			
			$table->integer('quantity')->default(0);
            //$table->primary(['utensil_id', 'base_recipe_id']);
            $table->unique(['utensil_id', 'base_recipe_id'], 'base_recipe_utensil_unique_key');
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('base_recipe_utensil');
    }
}
