<?php

use Illuminate\Database\Seeder;

class ProductColorTableSeeder extends Seeder
{
    public function run()
    {
    	$productColor = array(
    		array('FK_color' => 2, 'FK_product' => 1),
    		array('FK_color' => 3, 'FK_product' => 1),
    		array('FK_color' => 4, 'FK_product' => 2),
    		array('FK_color' => 5, 'FK_product' => 2),
    		array('FK_color' => 2, 'FK_product' => 2),
    		array('FK_color' => 5, 'FK_product' => 3),
    		array('FK_color' => 7, 'FK_product' => 3),
    		array('FK_color' => 12, 'FK_product' => 4),
    		array('FK_color' => 3, 'FK_product' => 5),
    		array('FK_color' => 11, 'FK_product' => 5),
    		array('FK_color' => 5, 'FK_product' => 5),
    		array('FK_color' => 7, 'FK_product' => 6),
    		array('FK_color' => 4, 'FK_product' => 6),
    		array('FK_color' => 8, 'FK_product' => 7),
    		array('FK_color' => 5, 'FK_product' => 8),
    		array('FK_color' => 3, 'FK_product' => 8),
    		array('FK_color' => 7, 'FK_product' => 9),
    		array('FK_color' => 8, 'FK_product' => 9),
        	
        	);

        DB::table('colors_products')->insert($productColor);
    }
}
