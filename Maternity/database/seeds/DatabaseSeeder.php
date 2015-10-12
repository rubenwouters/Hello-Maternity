<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductColorTableSeeder::class);

        Model::reguard();
    }
}
