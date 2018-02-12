<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collate = 'latin1_spanish_ci';

            $table->increments('codPersonal')->unique();
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('codigoPersonal')->unique();
            $table->string('cuenta')->unique();
            $table->string('password');
            $table->string('tipoCuenta');
            $table->boolean('estado')->default('1');
        });

        DB::table('personal')->insert([
                'dni' => '12345678',
                'nombres' => 'root',
                'apellidos' => 'root',
                'email' => 'root@gmail.com',
                'codigoPersonal' => 'cp1',
                'cuenta' => 'root',
                'password' => 'root',
                'tipoCuenta' => 'Administrador'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personal');
    }
}
