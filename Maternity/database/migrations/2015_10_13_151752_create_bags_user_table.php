<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagsUserTable extends Migration
{
    public function up()
    {
        Schema::create('bags_users', function (Blueprint $table) {
            $table->integer('FK_bag');
            $table->integer('FK_user');
        });
    }

    public function down()
    {
        Schema::drop('bags_users');
    }
}
