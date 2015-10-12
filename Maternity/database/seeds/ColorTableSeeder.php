<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    public function run()
    {
        $colors = array(
        	array('name' => "#F18351"),
			array('name' => '#EFC265'),
			array('name' => '#DFD76E'),
			array('name' => '#8BBF69'),
			array('name' => '#47B87F'),
			array('name' => '#21B89E'),
			array('name' => '#28BCCE'),
			array('name' => '#3D93C3'),
			array('name' => '#955B99'),
			array('name' => '#F46F81'),
			array('name' => 'white'),
			array('name' => '#AE795A'),
			array('name' => '#DCBE71'),
			array('name' => '#DEE0C3'),
			array('name' => '777777'),
			array('name' => 'black')
		);

        DB::table('colors')->insert($colors);
    }
}
