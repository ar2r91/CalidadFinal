<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Intraoral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intraoral', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codIntraoral')->unique();
            $table->string('ubicacion');
            $table->date('fecha');
            $table->boolean('estabilidadmecanica');
            $table->boolean('movimientoequipo');
            $table->boolean('estadocables');
            $table->boolean('grantygira');
            $table->boolean('indicadoresoperativos');
            $table->boolean('aireacondicionado');
            $table->boolean('sistemaaudible');
            $table->boolean('manualequipo');
            $table->boolean('certificado');
            $table->text('conclusiones');
            $table->text('recomendaciones');
            $table->text('vigencia');
            $table->boolean('estado')->default('1');

            $table->integer('idCliente')->unsigned();
            $table->integer('idRayosX')->unsigned();
            $table->integer('idParamGeometricos')->unsigned();
            $table->integer('idCalidadHaz')->unsigned();
            $table->integer('idTiempoExposicion')->unsigned();
            $table->integer('idRendimiento')->unsigned();
            $table->integer('idDosisPaciente')->unsigned();
            $table->integer('idEquipoMedicion')->unsigned();
            $table->integer('idPersonal')->unsigned();
        });

        Schema::table('intraoral', function ($table) {
            $table->foreign('idCliente')->references('codCliente')->on('cliente');
            $table->foreign('idRayosX')->references('codRayosX')->on('rayosx');
            $table->foreign('idParamGeometricos')->references('codParamGeometricos')->on('paramgeometrico');
            $table->foreign('idCalidadHaz')->references('codCalidadHaz')->on('calidadhaz');
            $table->foreign('idTiempoExposicion')->references('codTiempoExposicion')->on('tiempoexposicion');
            $table->foreign('idRendimiento')->references('codRendimiento')->on('rendimiento');
            $table->foreign('idDosisPaciente')->references('codDosisPaciente')->on('dosispaciente');
            $table->foreign('idEquipoMedicion')->references('codEquipoMedicion')->on('equipomedicion');
            $table->foreign('idPersonal')->references('codPersonal')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('intraoral');
    }
}
