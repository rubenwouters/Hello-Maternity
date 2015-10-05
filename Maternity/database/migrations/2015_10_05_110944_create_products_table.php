<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('tblProducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_type');
            $table->integer('FK_user');
            $table->string('name');
            $table->string('brand');
            $table->string('size');
            $table->integer('price');
            $table->string('image');
            $table->string('buyer');
            $table->string('seller');
            $table->integer('paid');
        });
    }

    public function down()
    {
        Schema::drop('tblProducts');
    }
}
