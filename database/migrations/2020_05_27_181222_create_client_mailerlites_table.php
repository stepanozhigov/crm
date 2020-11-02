<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMailerlitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_mailerlites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->string('ml_client_id', 255);
            $table->unsignedInteger('mailerlite_group_id')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
            $table->foreign('mailerlite_group_id')->references('id')->on('mailerlite_groups')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_mailerlites');
    }
}
