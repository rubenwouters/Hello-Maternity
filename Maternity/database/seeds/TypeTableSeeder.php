<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        $types = array(
        	array('name' => "top"),
			array('name' => 'pants'),
			array('name' => 'skirt'),
		);

        DB::table('types')->insert($types);
    }
}
