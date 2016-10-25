<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitsX100ToUtensilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utensils', function (Blueprint $table) {
            $table->smallInteger('units_x_100')->default(0)->after('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utensils', function (Blueprint $table) {
            $table->dropColumn('units_x_100');
        });
    }
}
