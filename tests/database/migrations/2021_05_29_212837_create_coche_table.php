<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCocheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coche', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->enum('mano', ['primera', 'segunda'])->nullable();
            $table->enum('tipo', ['berlina', 'familiar', 'coupe', 'monovolumen', '4x4suv', 'cabrio', 'pickup', 'furgoneta', 'deportivo', 'clasico']);
            $table->integer('marca_id');
            $table->integer('anio_id');
            $table->integer('modelo_id');
            $table->decimal('precio', 10, 2);
            $table->decimal('precioFinanciado', 10, 2)->nullable();
            $table->unsignedMediumInteger('km');
            $table->string('provincia', 30)->nullable();
            $table->unsignedSmallInteger('cv')->nullable();
            $table->string('color', 40);
            $table->enum('combustible', ['gasolina', 'diesel', 'electrico', 'hibrido', 'hibridoenchufable', 'gaslicuado', 'gasnatural', 'otro'])->nullable();
            $table->enum('puertas', ['2', '3', '4', '5', '6'])->nullable();
            $table->enum('cambio', ['automatico', 'manual']);
            $table->enum('plazas', ['2', '3', '4', '5', '6', '7+'])->nullable();
            $table->string('accesorios')->nullable();
            $table->text('comentario')->nullable();
            $table->mediumblob('foto')->nullable();
            $table->tinyInteger('verificado')->nullable();
            $table->tinyInteger('destacado')->nullable();
            $table->enum('causa', [null, 'vendido', 'retirado', 'otro'])->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('anio_id', 'coche_anio_id_foreign')->references('id')->on('make_years');
            $table->foreign('iduser', 'coche_iduser_foreign')->references('id')->on('users');
            $table->foreign('marca_id', 'coche_marca_id_foreign')->references('id')->on('makes');
            $table->foreign('modelo_id', 'coche_modelo_id_foreign')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coche');
    }
}
