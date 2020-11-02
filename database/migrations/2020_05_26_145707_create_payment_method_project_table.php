<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_method_project', function (Blueprint $table) {
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('project_id');

            $table->unique(['payment_method_id', 'project_id']);
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->cascadeOnDelete();
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
        Schema::dropIfExists('payment_method_project');
    }
}
