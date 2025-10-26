<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Laptops & Computers', 'description' => 'High-performance laptops, desktops, and workstations'],
            ['name' => 'Smartphones & Tablets', 'description' => 'Latest smartphones, tablets, and mobile devices'],
            ['name' => 'Audio & Headphones', 'description' => 'Premium headphones, earbuds, and audio equipment'],
            ['name' => 'Gaming', 'description' => 'Gaming consoles, accessories, and peripherals'],
            ['name' => 'Smart Home', 'description' => 'Smart home devices and IoT products'],
            ['name' => 'Cameras & Photography', 'description' => 'Digital cameras, lenses, and photography gear'],
            ['name' => 'Wearables', 'description' => 'Smartwatches, fitness trackers, and wearable tech'],
            ['name' => 'Accessories', 'description' => 'Cables, chargers, cases, and tech accessories'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
