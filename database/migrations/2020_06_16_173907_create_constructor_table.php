<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructors', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('project_id');
            $table->string('discount1')->nullable();
            $table->string('discount2')->nullable();
            $table->string('discount3')->nullable();

            $table->unique(['product_id', 'project_id']);
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constructor');
    }
}
