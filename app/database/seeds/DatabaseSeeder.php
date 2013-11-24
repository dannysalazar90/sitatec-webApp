<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UserTableSeeder');
		//tabla usuarios rellenada exitosamente!
        $this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {
 
    public function run()
    {
 
        DB::table('users')->insert(array(
                'username' => 'dsalazar',
                'password' => Hash::make('2641392'),
                'email' => 'dssm_15@hotmail.com'
        ));

        DB::table('users')->insert(array(
                'username' => 'dmorales',
                'password' => Hash::make('12345'),
                'email' => 'df-03@hotmail.com'
        ));

        DB::table('users')->insert(array(
                'username' => 'ccuastumal',
                'password' => Hash::make('12345'),
                'email' => 'cristiandavid432@hotmail.com'
        ));

        DB::table('users')->insert(array(
                'username' => 'inanez',
                'password' => Hash::make('12345'),
                'email' => 'hnanez5@gmail.com'
        ));

        DB::table('users')->insert(array(
                'username' => 'jtorres',
                'password' => Hash::make('12345'),
                'email' => 'jt.julian@hotmail.com'
        ));
    }
}