<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_product', function (Blueprint $table) {
            $table->unsignedInteger('discount_id');
            $table->unsignedInteger('product_id');

            $table->unique(['discount_id', 'product_id']);
            $table->foreign('discount_id')->references('id')->on('discounts')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_product', function($table) {
            $table->dropForeign('discount_id');
            $table->dropForeign('product_id');
        });
        Schema::dropIfExists('discount_product');
    }
}
