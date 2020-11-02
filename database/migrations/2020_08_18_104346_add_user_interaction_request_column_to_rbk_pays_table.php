<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserInteractionRequestColumnToRbkPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rbk_pays', function (Blueprint $table) {
            $table->json('user_interaction_request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rbk_pays', function (Blueprint $table) {
            $table->dropColumn('user_interaction_request');
        });
    }

}
