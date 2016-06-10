<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateprovidersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->primary('id');
            $table->string('code', 128);
            $table->string('name', 128);
            $table->string('specialty', 128);
            $table->string('district', 128);
            $table->text('address');
            $table->string('phone', 128);
            $table->string('movil1', 128);
            $table->string('movil2', 128);
            $table->string('contact', 128);
            $table->string('email', 128);
            $table->dateTime('deleted_at');
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
        Schema::drop('providers');
    }
}
