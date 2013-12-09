<?php

use Illuminate\Database\Migrations\Migration;

class AddNameFechas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('fechas', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('fecha', 20);
            $tabla->string('name', 100);
            $tabla->string('porcentaje', 20);
            $tabla->string('operator_id', 5);
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
		Schema::drop('fechas');
	}

}