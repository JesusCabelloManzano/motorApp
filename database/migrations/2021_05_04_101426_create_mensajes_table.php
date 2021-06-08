<?php

use App\Models\Mensaje;
use App\Models\Coche;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Mensaje::TABLA, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->unsignedBigInteger('idcoche');
            $table->string('nombre', 100);
            $table->string('email', 150)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->text('mensaje');
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on(User::TABLA);
            $table->foreign('idcoche')->references('id')->on(Coche::TABLA);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Mensaje::TABLA);
    }
}
