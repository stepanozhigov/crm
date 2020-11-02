<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoauthorBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coauthor_bill', function (Blueprint $table) {
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('coauthor_id');
            $table->integer('sum');
            $table->timestamps();

            $table->foreign('bill_id')->on('bills')->references('id')->cascadeOnDelete();
            $table->foreign('coauthor_id')->on('coauthors')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coauthor_bill');
    }
}
