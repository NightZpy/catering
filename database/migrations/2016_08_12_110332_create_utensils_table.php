<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateutensilsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utensils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128)->unique();
            $table->integer('stock');
            $table->integer('category_id');
            $table->foreign('category_id')
                ->references('id')->on('utensil_categories')
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
        Schema::drop('utensils');
    }
}
