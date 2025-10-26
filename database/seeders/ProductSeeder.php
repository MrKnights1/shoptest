<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Laptops & Computers
            ['category_id' => 1, 'name' => 'MacBook Pro 16" M3 Max', 'description' => 'Powerful laptop with M3 Max chip, 36GB RAM, 1TB SSD. Perfect for professionals and creators.', 'price' => 3499.00, 'stock_quantity' => 15, 'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&h=400&fit=crop'],
            ['category_id' => 1, 'name' => 'Dell XPS 15 Gaming Laptop', 'description' => 'Intel Core i9, 32GB RAM, RTX 4070, 1TB NVMe SSD. Ultimate gaming performance.', 'price' => 2299.99, 'stock_quantity' => 12, 'image_url' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=400&h=400&fit=crop'],
            ['category_id' => 1, 'name' => 'Custom Gaming PC - RTX 4090', 'description' => 'AMD Ryzen 9 7950X, 64GB DDR5, RTX 4090, 2TB Gen4 SSD. Built for extreme gaming.', 'price' => 4999.00, 'stock_quantity' => 5, 'image_url' => 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=400&h=400&fit=crop'],

            // Smartphones & Tablets
            ['category_id' => 2, 'name' => 'iPhone 15 Pro Max 512GB', 'description' => 'Titanium design, A17 Pro chip, advanced camera system with 5x optical zoom.', 'price' => 1399.00, 'stock_quantity' => 25, 'image_url' => 'https://images.unsplash.com/photo-1592286927505-dfe0bb7ec618?w=400&h=400&fit=crop'],
            ['category_id' => 2, 'name' => 'Samsung Galaxy S24 Ultra', 'description' => 'AI-powered smartphone with S Pen, 200MP camera, and stunning display.', 'price' => 1199.99, 'stock_quantity' => 30, 'image_url' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=400&h=400&fit=crop'],
            ['category_id' => 2, 'name' => 'iPad Pro 12.9" M2', 'description' => 'M2 chip, Liquid Retina XDR display, 512GB storage. Professional tablet experience.', 'price' => 1499.00, 'stock_quantity' => 18, 'image_url' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=400&fit=crop'],

            // Audio & Headphones
            ['category_id' => 3, 'name' => 'Sony WH-1000XM5', 'description' => 'Industry-leading noise cancellation, 30-hour battery, premium sound quality.', 'price' => 399.99, 'stock_quantity' => 40, 'image_url' => 'https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=400&h=400&fit=crop'],
            ['category_id' => 3, 'name' => 'AirPods Pro (2nd Gen)', 'description' => 'Active noise cancellation, spatial audio, MagSafe charging case.', 'price' => 249.00, 'stock_quantity' => 60, 'image_url' => 'https://images.unsplash.com/photo-1606841837239-c5a1a4a07af7?w=400&h=400&fit=crop'],
            ['category_id' => 3, 'name' => 'Bose QuietComfort Ultra', 'description' => 'Immersive audio, world-class noise cancellation, all-day comfort.', 'price' => 429.00, 'stock_quantity' => 35, 'image_url' => 'https://images.unsplash.com/photo-1484704849700-f032a568e944?w=400&h=400&fit=crop'],

            // Gaming
            ['category_id' => 4, 'name' => 'PlayStation 5 Pro', 'description' => '2TB storage, enhanced graphics, 8K gaming ready. Includes DualSense controller.', 'price' => 699.99, 'stock_quantity' => 20, 'image_url' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400&h=400&fit=crop'],
            ['category_id' => 4, 'name' => 'Xbox Series X 1TB', 'description' => '4K gaming at 120fps, quick resume, Game Pass ready.', 'price' => 499.99, 'stock_quantity' => 22, 'image_url' => 'https://images.unsplash.com/photo-1621259182978-fbf93132d53d?w=400&h=400&fit=crop'],
            ['category_id' => 4, 'name' => 'Logitech G Pro X Superlight', 'description' => 'Wireless gaming mouse, 25K sensor, 63g ultra-light design.', 'price' => 159.99, 'stock_quantity' => 50, 'image_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=400&fit=crop'],

            // Smart Home
            ['category_id' => 5, 'name' => 'Amazon Echo Studio', 'description' => 'Premium smart speaker with spatial audio and Alexa voice control.', 'price' => 199.99, 'stock_quantity' => 45, 'image_url' => 'https://images.unsplash.com/photo-1543512214-318c7553f230?w=400&h=400&fit=crop'],
            ['category_id' => 5, 'name' => 'Google Nest Hub Max', 'description' => '10" display, smart home control, video calling, Google Assistant.', 'price' => 229.00, 'stock_quantity' => 38, 'image_url' => 'https://images.unsplash.com/photo-1558089687-517f44c4e171?w=400&h=400&fit=crop'],
            ['category_id' => 5, 'name' => 'Ring Video Doorbell Pro 2', 'description' => 'HD+ video, 3D motion detection, advanced security features.', 'price' => 249.99, 'stock_quantity' => 55, 'image_url' => 'https://images.unsplash.com/photo-1558002038-1055907df827?w=400&h=400&fit=crop'],

            // Cameras & Photography
            ['category_id' => 6, 'name' => 'Sony A7 IV Mirrorless', 'description' => '33MP full-frame sensor, 4K 60fps video, advanced autofocus system.', 'price' => 2498.00, 'stock_quantity' => 8, 'image_url' => 'https://images.unsplash.com/photo-1606980289168-cb3c1e3e3fb9?w=400&h=400&fit=crop'],
            ['category_id' => 6, 'name' => 'Canon EOS R6 Mark II', 'description' => '24.2MP sensor, 8K video, dual card slots, weather-sealed body.', 'price' => 2399.00, 'stock_quantity' => 10, 'image_url' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400&h=400&fit=crop'],
            ['category_id' => 6, 'name' => 'DJI Mini 4 Pro Drone', 'description' => '4K HDR video, 34-min flight time, omnidirectional obstacle sensing.', 'price' => 759.00, 'stock_quantity' => 28, 'image_url' => 'https://images.unsplash.com/photo-1508444845599-5c89863b1c44?w=400&h=400&fit=crop'],

            // Wearables
            ['category_id' => 7, 'name' => 'Apple Watch Ultra 2', 'description' => 'Titanium case, precision dual-frequency GPS, up to 36 hours battery.', 'price' => 799.00, 'stock_quantity' => 32, 'image_url' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=400&h=400&fit=crop'],
            ['category_id' => 7, 'name' => 'Samsung Galaxy Watch 6', 'description' => 'Advanced health monitoring, sleep tracking, 40+ hour battery life.', 'price' => 299.99, 'stock_quantity' => 45, 'image_url' => 'https://images.unsplash.com/photo-1617625802912-cde586faf331?w=400&h=400&fit=crop'],
            ['category_id' => 7, 'name' => 'Fitbit Charge 6', 'description' => 'Fitness tracker with built-in GPS, heart rate monitoring, 7-day battery.', 'price' => 159.99, 'stock_quantity' => 70, 'image_url' => 'https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=400&h=400&fit=crop'],

            // Accessories
            ['category_id' => 8, 'name' => 'Anker 737 Power Bank', 'description' => '24,000mAh capacity, 140W output, charges laptops and phones.', 'price' => 149.99, 'stock_quantity' => 85, 'image_url' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=400&h=400&fit=crop'],
            ['category_id' => 8, 'name' => 'Samsung T7 Portable SSD 2TB', 'description' => 'Up to 1050MB/s transfer speed, compact design, password protection.', 'price' => 199.99, 'stock_quantity' => 65, 'image_url' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?w=400&h=400&fit=crop'],
            ['category_id' => 8, 'name' => 'USB-C Hub 11-in-1', 'description' => 'Multiple ports including HDMI, USB 3.0, SD card, Ethernet, 100W PD charging.', 'price' => 79.99, 'stock_quantity' => 120, 'image_url' => 'https://images.unsplash.com/photo-1625948515291-69613efd103f?w=400&h=400&fit=crop'],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
