<?php

use Illuminate\Database\Migrations\Migration;

class CreateLlamadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('llamadas', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('numero_origen', 15);
            $tabla->string('numero_destino', 15);
            $tabla->string('fecha_inicio', 25);
            $tabla->string('fecha_fin', 25);
            $tabla->string('duracion', 10);
            $tabla->string('precio', 20);
            $tabla->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}