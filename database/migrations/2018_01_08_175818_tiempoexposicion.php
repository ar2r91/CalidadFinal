<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tiempoexposicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempoexposicion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codTiempoExposicion')->unique();
            $table->double('tiemponominal');
            $table->double('tiempomedio');
            $table->double('resultadoti');
            $table->boolean('valoraceptableti');

            $table->double('tiempo1');
            $table->double('tiempo2');
            $table->double('tiempo3');
            $table->double('resultadotie');
            $table->boolean('valoraceptabletie');

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
        Schema::drop('tiempoexposicion');
    }
}
