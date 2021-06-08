<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->unsignedBigInteger('idcoche');
            $table->string('nombre', 100);
            $table->string('email', 150)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->text('mensaje');
            $table->boolean('leido')->default(0);
            $table->timestamps();
            $table->foreign('idcoche', 'mensaje_idcoche_foreign')->references('id')->on('coche');
            $table->foreign('iduser', 'mensaje_iduser_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensaje');
    }
}
