<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemTipeIdToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('item_type_id')->unsigned()->index()->after('type');
            $table->foreign('item_type_id', 'items_item_type_id_foreign')
                ->references('id')
                ->on('item_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_item_type_id_foreign');
            $table->dropColumn('item_type_id');
        });
    }
}
