<?php

use Illuminate\Database\Migrations\Migration;

class CreateOperadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('operadores', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('operator_name', 50)->unique();
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
		Schema::drop('operadores');
	}

}