<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//creamos la tabla users con los campos necesarios
		Schema::create('users', function($tabla) 
        {
            $tabla->increments('id');
            $tabla->string('username', 50);
            $tabla->string('email', 100)->unique();
            $tabla->string('password', 200);
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
		//para hacer 'rollback' a la migracion y borrar la tabla users
		Schema::drop('users');
	}

}