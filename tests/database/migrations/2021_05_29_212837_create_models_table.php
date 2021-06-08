<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->integer('makeyear_id')->nullable();
            $table->unique(['name', 'makeyear_id'], 'modeloAnio');
            $table->foreign('makeyear_id', 'marcaAnio_id')->references('id')->on('make_years')->onDelete('set NULL')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
