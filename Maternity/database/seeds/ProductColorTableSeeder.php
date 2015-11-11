<?php

use Illuminate\Database\Seeder;

class ProductColorTableSeeder extends Seeder
{
    public function run()
    {
    	$productColor = array(
            array('FK_color' => 8, 'FK_product' => 1),
    		array('FK_color' => 7, 'FK_product' => 1),
    		array('FK_color' => 8, 'FK_product' => 2),
            array('FK_color' => 14, 'FK_product' => 3),
            array('FK_color' => 10, 'FK_product' => 3),
            array('FK_color' => 8, 'FK_product' => 3),
    		array('FK_color' => 4, 'FK_product' => 3),
            array('FK_color' => 9, 'FK_product' => 4),
            array('FK_color' => 14, 'FK_product' => 4),
    		array('FK_color' => 8, 'FK_product' => 4),
    		array('FK_color' => 1, 'FK_product' => 5),
    		array('FK_color' => 7, 'FK_product' => 6),
        	
        	);

        DB::table('colors_products')->insert($productColor);
    }
}
