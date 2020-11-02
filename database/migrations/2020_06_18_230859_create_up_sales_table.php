<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('up_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('product_id');
            $table->tinyInteger('status')->default(0);
            $table->text('content');
            $table->timestamps();

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
        Schema::dropIfExists('up_sales');
    }
}
