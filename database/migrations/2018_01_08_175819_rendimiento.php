<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rendimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendimiento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codRendimiento')->unique();
            $table->double('dosisr1');
            $table->double('dosisr2');
            $table->double('dosisr3');
            $table->double('resultador');
            $table->boolean('aceptabler');
            $table->double('carga1');
            $table->double('dosisc1');
            $table->double('carga2');
            $table->double('dosisc2');
            $table->double('resultadoc');
            $table->boolean('aceptablec');
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
        Schema::drop('rendimiento');
    }
}
