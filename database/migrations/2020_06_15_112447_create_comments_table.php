<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('client_id');
            $table->text('content');
            $table->tinyInteger('approved')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('parent_id')->nullable();


            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('SET NULL');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
