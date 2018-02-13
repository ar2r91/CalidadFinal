<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logerrores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_errores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idLogErrores')->unique();
            $table->timestamp('fechaRegistro');
            $table->text('mensaje');
            $table->string('funcion');

            $table->integer('idPersonal')->unsigned();
        });

        Schema::table('log_errores', function ($table) {
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
        Schema::drop('log_errores');
    }
}
