<?php

use Illuminate\Database\Migrations\Migration;

class AddDiaEspecial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('dias', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('dia', 20);
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
		Schema::drop('dias');
	}

}