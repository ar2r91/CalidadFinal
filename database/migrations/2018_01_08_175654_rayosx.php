<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rayosx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayosx', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codRayosX')->unique();
            $table->string('tipo1');
            $table->string('tipo2');
            $table->string('equipo');
            $table->boolean('estado')->default('1');

            $table->integer('idComponentea')->unsigned();
            $table->integer('idComponenteb')->unsigned();
            $table->integer('idCliente')->unsigned();
        });

        Schema::table('rayosx', function ($table) {
            $table->foreign('idComponentea')->references('codComponentea')->on('componentea');
            $table->foreign('idComponenteb')->references('codComponenteb')->on('componenteb');
            $table->foreign('idCliente')->references('codCliente')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rayosx');
    }
}
