<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePurchaseQuantityFromBaseRecipeItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base_recipe_item', function (Blueprint $table) {
            $table->dropColumn('purchase_quantity');
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
            $table->integer('purchase_quantity');
        });
    }
}
