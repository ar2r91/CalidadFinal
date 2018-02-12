<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Componentepadre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentepadre', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codComponentePadre')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie')->unique();
            $table->string('tensionmax');
            $table->string('cargamax');
            $table->string('fabricacion');
            $table->string('instalacion');
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
        Schema::drop('componentepadre');
    }
}
