<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaseRecipesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128)->unique();
            $table->smallInteger('servings_quantity')->default(0);
            $table->smallInteger('quantity')->default(0);
            $table->text('description');
            $table->string('photo', 256)->nullable();
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')->on('recipe_types')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
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
        Schema::drop('base_recipes');
    }
}
