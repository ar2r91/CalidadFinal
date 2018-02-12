<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Componentea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentea', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codComponentea')->unique();
            $table->string('tipo3');
            $table->boolean('estado')->default('1');

            $table->integer('idComponentePadre')->unsigned();
        });

        Schema::table('componentea', function ($table) {
            $table->foreign('idComponentePadre')->references('codComponentePadre')->on('componentepadre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('componentea');
    }
}
