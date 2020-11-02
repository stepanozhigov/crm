<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUpSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_up_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('main_product_id');
            $table->unsignedInteger('additional_product_id');
            $table->tinyInteger('status')->default(0);

            $table->foreign('main_product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('additional_product_id')->references('id')->on('products')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_up_sale');
    }
}
