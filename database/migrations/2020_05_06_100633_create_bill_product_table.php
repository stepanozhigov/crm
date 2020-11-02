<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_product', function (Blueprint $table) {
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->unique(['bill_id', 'product_id']);
            $table->foreign('bill_id')->references('id')->on('bills')->cascadeOnDelete();
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
        Schema::dropIfExists('bill_product');
    }
}
