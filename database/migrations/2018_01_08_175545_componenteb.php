<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Componenteb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componenteb', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codComponenteb')->unique();
            $table->string('tipo4');
            $table->boolean('estado')->default('1');

            $table->integer('idComponentePadre')->unsigned();
        });

        Schema::table('componenteb', function ($table) {
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
        Schema::drop('componenteb');
    }
}
