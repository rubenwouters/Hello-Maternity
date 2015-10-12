<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
		$users = array(

			array(	'name' => 'Ruben', 
					'email' => 'ruben@test.be',
					'password' => '$2y$10$SFeuTFpJiFtJNGio19oDv.Mfwf2YFmrHJJ/0xTLTQUSSqdBWSF8h6',
					'location' => "Antwerp"
			));

			DB::table('users')->insert($users);
    }
}
