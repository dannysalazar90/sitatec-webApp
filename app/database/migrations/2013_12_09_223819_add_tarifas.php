<?php

use Illuminate\Database\Migrations\Migration;

class AddTarifas extends Migration {

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
            $tabla->string('operator_origen', 5);
            $tabla->string('operator_destino', 5);
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