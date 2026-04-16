<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });

        $products = [
            [
                'name' => 'Hair Styling Cream',
                'description' => 'Professional styling cream for perfect hold and natural finish. Ideal for all hair types, providing medium hold with a matte finish.',
                'price' => 19.99,
                'image' => 'image/item1.png',
                'stock' => 100
            ],
            [
                'name' => 'Beard Care Oil',
                'description' => 'Premium beard oil that softens and conditions facial hair while moisturizing the skin underneath. Made with natural ingredients.',
                'price' => 19.99,
                'image' => 'image/item2.png',
                'stock' => 100
            ],
            [
                'name' => 'Hair Wax',
                'description' => 'Strong hold hair wax for professional styling. Perfect for creating textured, modern hairstyles with a natural shine.',
                'price' => 19.99,
                'image' => 'image/item3.png',
                'stock' => 100
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
