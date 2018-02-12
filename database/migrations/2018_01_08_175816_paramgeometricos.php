<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paramgeometricos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramgeometrico', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codParamGeometricos')->unique();
            $table->double('tamanio');
            $table->boolean('valoraceptablet');
            $table->double('distancia');
            $table->boolean('valoraceptabled');
            $table->boolean('alinamineto')->default('0');
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
        Schema::drop('paramgeometrico');
    }
}
