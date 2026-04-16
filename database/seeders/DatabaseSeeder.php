<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Hair Styling Cream',
                'description' => 'Professional styling cream for perfect hold and natural finish. Ideal for all hair types, providing medium hold with a matte finish.',
                'price'       => 19.99,
                'image'       => 'image/item1.png',
                'stock'       => 100,
            ],
            [
                'name'        => 'Beard Care Oil',
                'description' => 'Premium beard oil that softens and conditions facial hair while moisturizing the skin underneath. Made with natural ingredients.',
                'price'       => 19.99,
                'image'       => 'image/item2.png',
                'stock'       => 100,
            ],
            [
                'name'        => 'Hair Wax',
                'description' => 'Strong hold hair wax for professional styling. Perfect for creating textured, modern hairstyles with a natural shine.',
                'price'       => 19.99,
                'image'       => 'image/item3.png',
                'stock'       => 100,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
