<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRbkPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbk_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->text('invoice');
            $table->string('status', 32);
            $table->string('invoice_id')->index();
            $table->string('payment_id')->nullable();
            $table->text('invoice_access_token');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rbk_pays');
    }
}
