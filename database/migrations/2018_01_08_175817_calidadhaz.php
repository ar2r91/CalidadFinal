<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calidadhaz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidadhaz', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codCalidadHaz')->unique();
            $table->double('tensionnominal');
            $table->double('tensionmedia');
            $table->double('resultadotn');
            $table->boolean('valoraceptabletn');

            $table->double('tension1');
            $table->double('tension2');
            $table->double('tension3');
            $table->double('resultadot');
            $table->boolean('valoraceptablet');

            $table->double('filtracion');
            $table->double('tensionf');
            $table->boolean('valoraceptablef');

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
        Schema::drop('calidadhaz');
    }
}
