<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCostPerQuantityFromBaseRecipeItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base_recipe_item', function (Blueprint $table) {
            $table->dropColumn('cost_per_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base_recipe_item', function (Blueprint $table) {
            $table->smallInteger('cost_per_quantity')->default(0);
        });
    }
}
