<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        $types = array(
        	array('name' => "pants"),
			array('name' => 'top'),
			array('name' => 'other'),
		);

        DB::table('types')->insert($types);
    }
}
