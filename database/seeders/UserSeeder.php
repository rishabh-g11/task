<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('admin@123'),
            'role' => 'admin',
        ]);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@demo.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'is_email_verified' => 1,
        ]);
    }
}
