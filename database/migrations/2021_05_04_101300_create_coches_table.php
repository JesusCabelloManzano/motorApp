<?php

use App\Models\Coche;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Coche::TABLA, function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('iduser')->unsigned();
            $table->unsignedBigInteger('iduser');
            $table->string('titulo', 150);
            $table->enum('mano', ['Primera', 'Segunda', 'Tercera o más'])->nullable();
            $table->integer('tipo_id');
            $table->integer('marca_id');
            $table->integer('anio_id');
            $table->integer('modelo_id');
            $table->unsignedMediumInteger('precio');
            $table->unsignedMediumInteger('precioFinanciado')->nullable();
            $table->unsignedMediumInteger('km');
            $table->integer('provincia_id')->nullable();
            $table->unsignedSmallInteger('cv')->nullable();
            $table->string('color', 40);
            $table->enum('combustible', ['gasolina', 'diesel', 'electrico', 'hibrido', 'hibridoEnchufable', 'gasLicuado', 'gasNatural', 'otro'])->nullable();
            $table->enum('puertas', [2, 3, 4, 5, 6])->nullable();
            $table->enum('cambio', ['automatico', 'manual']);
            $table->enum('plazas', ['2', '3', '4', '5', '6', '7+'])->nullable();
            /*$table->string('accesorios')->nullable();*/
            $table->text('comentario')->nullable();
            $table->binary('foto')->nullable();
            $table->boolean('verificado')->nullable();
            $table->boolean('destacado')->nullable();
            $table->enum('causa', ['nulo', 'vendido', 'retirado', 'otro'])->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('iduser')->references('id')->on(User::TABLA);
            $table->foreign('tipo_id')->references('id')->on('vehicle_types');
            $table->foreign('marca_id')->references('id')->on('makes');
            $table->foreign('anio_id')->references('id')->on('make_years');
            $table->foreign('modelo_id')->references('id')->on('model_cars');
            $table->foreign('provincia_id')->references('id')->on('states');
        });
        //modificación 'hard' de la estructura de la tabla
        //DB::unprepared('alter table '. Coche::TABLA . 'change column foto foto mediumblob;');
        $sql = 'alter table ' . Coche::TABLA . ' change foto foto mediumblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Coche::TABLA);
    }
}
