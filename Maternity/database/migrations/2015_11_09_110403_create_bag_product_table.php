<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagProductTable extends Migration
{
    public function up()
    {
        Schema::create('bags_products', function (Blueprint $table) {
            $table->integer('FK_bag');
            $table->integer('FK_product');
        });
    }

    public function down()
    {
        Schema::drop('bags_products');
    }
}
