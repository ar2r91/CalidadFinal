<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dosispaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosispaciente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codDosisPaciente')->unique();
            $table->String('exploracion');
            $table->double('dosis');
            $table->boolean('valoraceptable');
            $table->double('distancia');
            $table->double('tension');
            $table->double('corriente');
            $table->double('tiempoexposicion');
            $table->boolean('estado')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dosispaciente');
    }
}
