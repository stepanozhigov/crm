<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMainProductIdColumnProductUpSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_up_sale', function (Blueprint $table) {
            $table->renameColumn('main_product_id', 'up_sale_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_up_sale', function (Blueprint $table) {
            $table->renameColumn('up_sale_id', 'main_product_id');
        });
    }
}
