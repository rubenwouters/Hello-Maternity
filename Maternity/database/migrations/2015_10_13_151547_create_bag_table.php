<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagTable extends Migration
{
    
    public function up()
    {
        Schema::create('bags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productId');
            $table->integer('inBag');
        });
    }

    public function down()
    {
        Schema::drop('bags');
    }
}
