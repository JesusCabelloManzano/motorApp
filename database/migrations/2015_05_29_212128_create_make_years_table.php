<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakeYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_years', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('year');
            $table->integer('make_id')->nullable();
            
            $table->unique(['year', 'make_id'], 'anioMarca');
            $table->foreign('make_id', 'marca_id')->references('id')->on('makes')->onDelete('set NULL')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('make_years');
    }
}
