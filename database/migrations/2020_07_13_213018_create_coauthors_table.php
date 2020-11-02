<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoauthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coauthors', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('coauthor');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('commission');
            $table->tinyInteger('commission_type');
            $table->timestamps();

            $table->foreign('product_id')->on('products')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coauthors');
    }
}
