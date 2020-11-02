<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCoautorBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coauthor_bill', function (Blueprint $table) {
            $table->unique(['bill_id', 'coauthor_id'], 'coauthor_bill_bill_id_coauthor_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coauthor_bill', function (Blueprint $table) {
            $table->dropUnique('coauthor_bill_bill_id_coauthor_id_index');
        });
    }
}
