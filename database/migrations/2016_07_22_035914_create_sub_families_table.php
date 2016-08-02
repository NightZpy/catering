<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubFamiliesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->integer('code')->unique();            
            $table->integer('family_id')->unsigned();
            $table->foreign('family_id')
                ->references('id')->on('families')
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
        Schema::drop('sub_families');
    }
}
