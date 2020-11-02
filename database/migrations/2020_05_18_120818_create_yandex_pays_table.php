<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYandexPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yandex_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('yandex_id');
            $table->string('description')->nullable();
            $table->string('confirmation_url')->nullable();
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
        Schema::dropIfExists('yandex_pays');
    }
}
