<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logactvidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logactividad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codLog')->unique();
            $table->string('descripcion');
            $table->dateTime('fecha');
            $table->boolean('estado')->default('1');

            $table->integer('idPersonal')->unsigned();
        });

        Schema::table('logactividad', function ($table) {

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
        Schema::drop('logactividad');
    }
}
