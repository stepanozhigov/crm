<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->string('model')->nullable();
        });

        DB::table('payment_methods')->where('id', 1)->update(['model' => 'App\Models\RbkPay']);
        DB::table('payment_methods')->where('id', 2)->update(['model' => 'App\Models\YandexPay']);
        DB::table('payment_methods')->where('id', 3)->update(['model' => 'App\Models\PayPalPay']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_method_project', function (Blueprint $table) {
            $table->dropColumn('model');
        });
    }
}
