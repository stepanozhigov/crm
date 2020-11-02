<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailerliteGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailerlite_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ml_group_id');
            $table->string('name');
            $table->unsignedInteger('product_id');
            $table->tinyInteger('paid');
            $table->softDeletes();
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
        Schema::dropIfExists('mailerlite_groups');
    }
}
