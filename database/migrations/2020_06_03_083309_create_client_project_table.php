<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_project', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('project_id');
            $table->timestamps();

            $table->unique(['client_id', 'project_id']);
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
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
        Schema::dropIfExists('client_project');
    }
}
