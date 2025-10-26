<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@shop.com',
            'password' => bcrypt('Admin@123'),
            'phone' => '123-456-7890',
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
