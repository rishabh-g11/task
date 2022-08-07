<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\ProductDetailsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ProductDetailsSeeder::class);
    }
}
