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
            $table->string('code', 128)->unique();
            $table->string('name', 128)->unique();
            $table->string('specialty', 128)->nullable();
            $table->string('district', 128)->nullable();
            $table->text('address', 128)->nullable();
            $table->string('phone', 128);
            $table->string('movil1', 128)->nullable();
            $table->string('movil2', 128)->nullable();
            $table->string('contact', 128)->nullable();
            $table->string('email', 128);
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
