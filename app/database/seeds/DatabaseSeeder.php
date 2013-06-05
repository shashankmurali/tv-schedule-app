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

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'first_name' => 'test',
                'last_name' => 'test'
        ));
        User::create(array(
                'email' => 'test1@test.com',
                'password' => Hash::make('_password'),
                'first_name' => 'test2',
                'last_name' => 'test2'
        ));    
    }
}