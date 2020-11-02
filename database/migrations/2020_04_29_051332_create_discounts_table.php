<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('size');
            $table->tinyInteger('type');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('sw_time_limit')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('discounts');
    }
}
