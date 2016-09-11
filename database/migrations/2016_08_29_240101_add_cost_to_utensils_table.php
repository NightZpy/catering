<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostToUtensilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utensils', function (Blueprint $table) {
            $table->decimal('cost', 10 ,2)->default(0.0)->after('stock');
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
            $table->dropColumn('cost');
        });
    }
}
