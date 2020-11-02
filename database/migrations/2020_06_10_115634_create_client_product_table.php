<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_product', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('bill_id')->nullable()->default(null);
            $table->timestamps();

            $table->unique(['client_id', 'product_id']);
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_product');
    }
}
