<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('payment_system_id')->nullable();
            $table->string('payment_system_type')->nullable();
            $table->tinyInteger('invoice_status')->index();
            $table->timestamp('paid_at')->nullable();
            $table->unsignedInteger('sum')->nullable();
            $table->unsignedInteger('discount_id')->nullable();
            $table->unsignedInteger('sum_src')->nullable();
            $table->string('referrer', 255)->nullable();
            $table->unsignedInteger('tag_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function($table) {
            $table->dropForeign('product_id');
            $table->dropForeign('client_id');
            $table->dropForeign('discount_id');
        });
        Schema::dropIfExists('bills');
    }
}
