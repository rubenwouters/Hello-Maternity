<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
		$users = [
			[	
				'name' => 'Ruben', 
				'email' => 'ruben@test.be',
				'password' => bcrypt('tester'),
				'location' => 'Antwerp',
				'picture' => '1445340048.png'
			],
			[
				'name' => 'Dries',
				'email' => 'dries@test.com',
				'password' => bcrypt('tester'),
				'location' => 'Antwerp',
				'picture' => '1445340048.png'
			]
		];

		DB::table('users')->insert($users);
    }
}
