<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();
            $table->tinyInteger('type');
            $table->string('name', 255);
            $table->string('title', 255)->nullable();
            $table->string('youtube_id', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('content_video')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('fake_price')->nullable();
            $table->tinyInteger('unlim_bills')->default(0);
            $table->tinyInteger('private')->default(0);

            $table->timestamps();
            $table->softDeletes();

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
        Schema::table('products', function($table) {
            $table->dropForeign('category_id');
        });
        Schema::dropIfExists('products');
    }
}
