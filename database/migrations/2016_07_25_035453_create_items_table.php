<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateitemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->string('name', 128);
            $table->boolean('auto_provider');
            $table->boolean('perishable');
            $table->smallInteger('min_stock');
            $table->smallInteger('quantity');
            $table->string('currency', 128);
            $table->integer('unit_id');
            $table->integer('presentation_id');
            $table->integer('type_id');
            $table->integer('sub_family_id');
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
        Schema::drop('items');
    }
}
