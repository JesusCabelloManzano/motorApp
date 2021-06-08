<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name')->unique('name');
            $table->integer('vehicletype_id')->nullable();
            
            $table->unique(['name', 'vehicletype_id'], 'vehicleType');
            $table->foreign('vehicletype_id', 'vehicletype_id')->references('id')->on('vehicle_types')->onDelete('set NULL')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makes');
    }
}
