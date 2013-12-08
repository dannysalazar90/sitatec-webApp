<?php

use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tarifas', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('tarifa', 50);
            $tabla->string('operator_origen', 5)->unique();
            $tabla->string('operator_destino', 5)->unique();
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
		Schema::drop('tarifas');
	}

}