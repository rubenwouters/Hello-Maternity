<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $products = array(
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'M', 'price' => '50', 'image' => 'product_1.png', 'paid' => 0),
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'L', 'price' => '50', 'image' => 'product_2.png', 'paid' => 0),
        	array('FK_type' => 2, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'S', 'price' => '50', 'image' => 'product_3.png', 'paid' => 0),
        	array('FK_type' => 2, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'XL', 'price' => '50', 'image' => 'product_1.png', 'paid' => 0),
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'XS', 'price' => '50', 'image' => 'product_2.png', 'paid' => 0),
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'L', 'price' => '50', 'image' => 'product_3.png', 'paid' => 0),
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'M', 'price' => '50', 'image' => 'product_1.png', 'paid' => 0),
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'M', 'price' => '50', 'image' => 'product_2.png', 'paid' => 0),
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Sweater - ASOS', 'size' => 'M', 'price' => '50', 'image' => 'product_3.png', 'paid' => 0),
		);

        DB::table('products')->insert($products);
    }
}
