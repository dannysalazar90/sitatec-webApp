<?php

use Illuminate\Database\Migrations\Migration;

class CreateRangosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('rangos', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('range', 3)->unique();
            $tabla->string('operator_id', 5)->unique();
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
		Schema::drop('rangos');
	}

}