<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class InsertPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('payment_methods')->insert(
            [
                'name' => 'Stripe',
                'title' => 'Stripe',
                'status' => 1,
                'created_at' => (new Carbon())->format(Carbon::DEFAULT_TO_STRING_FORMAT),
                'updated_at' => (new Carbon())->format(Carbon::DEFAULT_TO_STRING_FORMAT),
                'model' => 'App\Models\StripePay',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
