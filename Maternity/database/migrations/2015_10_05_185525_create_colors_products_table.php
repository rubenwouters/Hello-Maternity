<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsProductsTable extends Migration
{
    public function up()
    {
        Schema::create('colors_products', function (Blueprint $table) {
            $table->integer('FK_color');
            $table->integer('FK_product');
        });
    }

    public function down()
    {
        Schema::drop('colors_products');
    }
}
