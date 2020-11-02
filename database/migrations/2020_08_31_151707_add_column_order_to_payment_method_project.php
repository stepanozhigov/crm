<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOrderToPaymentMethodProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_method_project', function (Blueprint $table) {
            $table->integer('order')->unsigned()->default(0)->after('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_method_project', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
