<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $products = array(
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Dress - Newlook', 'size' => 'M', 'price' => '15', 'image' => 'product_1.jpg', 'paid' => 0),
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Dress - Zara', 'size' => 'M', 'price' => '20', 'image' => 'product_2.jpg', 'paid' => 0),
        	array('FK_type' => 1, 'FK_user' => 1 , 'brand' => 'Skirt - H&M', 'size' => 'S', 'price' => '95', 'image' => 'product_3.jpg', 'paid' => 0),
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Dress - ASOS', 'size' => 'M', 'price' => '45', 'image' => 'product_4.jpg', 'paid' => 0),
        	array('FK_type' => 3, 'FK_user' => 1 , 'brand' => 'Dress - Mexx', 'size' => 'XS', 'price' => '110', 'image' => 'product_5.jpg', 'paid' => 0),
        	array('FK_type' => 2, 'FK_user' => 1 , 'brand' => 'Top - ASOS', 'size' => 'L', 'price' => '80', 'image' => 'product_6.jpg', 'paid' => 0),
		);

        DB::table('products')->insert($products);
    }
}
