<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_translates', function (Blueprint $table) {
            $table->unsignedInteger('source_id');
            $table->string('language_id');
            $table->text('translation');

            $table->unique(['source_id', 'language_id']);
            $table->foreign('source_id')->references('id')->on('language_sources')->cascadeOnDelete();
            $table->foreign('language_id')->references('language')->on('languages')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_translates');
    }
}
