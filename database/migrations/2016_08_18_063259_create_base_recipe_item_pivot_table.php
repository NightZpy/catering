<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaseRecipeItemPivotTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_recipe_item', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('base_recipes')->onDelete('cascade');
            
            $table->integer('item_id')->unsigned();            
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			
            $table->decimal('cost_per_quantity', 10 ,2)->default(0.0);
			$table->integer('purchase_quantity')->default(0);
			$table->decimal('decrease', 10 ,2)->default(0.0);
			$table->decimal('servings_quantity', 10 ,2)->default(0.0);
            //$table->primary(['item_id', 'base_id']);
            $table->unique(['item_id', 'base_id'], 'base_recipe_item_unique_key');
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
        Schema::drop('base_recipe_item');
    }
}
