<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email')->unique();
            $table->string('phone', 100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('password',255);
            $table->unsignedInteger('tag_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('clients');
    }
}
