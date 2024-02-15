<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
             Schema::disableForeignKeyConstraints();
             DB::table("products")->truncate();
             Schema::enableForeignKeyConstraints();

             $data = [
                [
                    'id' => 1,
                    'name' => 'Cotton T-Shirt',
                    'slug' => 'cotton-t-shirt',
                    'description' => 'Comfortable and breathable cotton T-shirt for everyday wear.',
                    'excerpt' => 'Classic cotton T-shirt with a comfortable fit.',
                    'price' => 19.99,
                    'quantity' => 100,
                    'category_id' => 1,
                    'color_id' => 1,
                    'size_id' => 3,
                    'image' => "/storage/product_id_1_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 2,
                    'name' => 'Slim Fit Jeans',
                    'slug' => 'slim-fit-jeans',
                    'description' => 'Stylish slim fit jeans made from high-quality denim.',
                    'excerpt' => 'Modern and trendy slim fit jeans for a fashionable look.',
                    'price' => 49.99,
                    'quantity' => 50,
                    'category_id' => 8,
                    'color_id' => 5,
                    'size_id' => 7,
                    'image' => "/storage/product_id_2_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 3,
                    'name' => "Women\'s Running Shoes",
                    'slug' => 'womens-running-shoes',
                    'description' => 'Lightweight and supportive running shoes for women.',
                    'excerpt' => 'Ideal for jogging and outdoor activities.',
                    'price' => 79.99,
                    'quantity' => 30,
                    'category_id' => 5,
                    'color_id' => 9,
                    'size_id' => 4,
                    'image' => "/storage/product_id_3_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 4,
                    'name' => 'Leather Handbag',
                    'slug' => 'leather-handbag',
                    'description' => 'Elegant leather handbag with multiple compartments.',
                    'excerpt' => 'Perfect for both casual and formal occasions.',
                    'price' => 129.99,
                    'quantity' => 20,
                    'category_id' => 11,
                    'color_id' => 10,
                    'size_id' => 10,
                    'image' => "/storage/product_id_4_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 5,
                    'name' => 'Classic Polo Shirt',
                    'slug' => 'classic-polo-shirt',
                    'description' => 'Timeless polo shirt with a clean and sophisticated design.',
                    'excerpt' => 'Versatile polo shirt suitable for various occasions.',
                    'price' => 29.99,
                    'quantity' => 80,
                    'category_id' => 2,
                    'color_id' => 2,
                    'size_id' => 4,
                    'image' => "/storage/product_id_5_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 6,
                    'name' => 'Formal Suit',
                    'slug' => 'formal-suit',
                    'description' => 'Elegantly tailored formal suit for men.',
                    'excerpt' => 'Perfect for business meetings and special occasions.',
                    'price' => 199.99,
                    'quantity' => 15,
                    'category_id' => 12,
                    'color_id' => 17,
                    'size_id' => 6,
                    'image' => "/storage/product_id_6_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 7,
                    'name' => 'Summer Dress',
                    'slug' => 'summer-dress',
                    'description' => 'Light and breezy summer dress with floral patterns.',
                    'excerpt' => 'Ideal for warm weather and casual outings.',
                    'price' => 39.99,
                    'quantity' => 60,
                    'category_id' => 13,
                    'color_id' => 6,
                    'size_id' => 3,
                    'image' => "/storage/product_id_7_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 8,
                    'name' => 'Winter Jacket',
                    'slug' => 'winter-jacket',
                    'description' => 'Warm and insulated winter jacket for cold days.',
                    'excerpt' => 'Stylish and practical outerwear for the winter season.',
                    'price' => 89.99,
                    'quantity' => 25,
                    'category_id' => 14,
                    'color_id' => 18,
                    'size_id' => 4,
                    'image' => "/storage/product_id_8_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 9,
                    'name' => 'Athletic Shorts',
                    'slug' => 'athletic-shorts',
                    'description' => 'Breathable and moisture-wicking athletic shorts.',
                    'excerpt' => 'Designed for comfort during workouts and sports activities.',
                    'price' => 24.99,
                    'quantity' => 40,
                    'category_id' => 6,
                    'color_id' => 4,
                    'size_id' => 2,
                    'image' => "/storage/product_id_1_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 10,
                    'name' => 'Casual Sneakers',
                    'slug' => 'casual-sneakers',
                    'description' => 'Versatile and comfortable sneakers for everyday wear.',
                    'excerpt' => 'Pair them with jeans or casual outfits for a laid-back look.',
                    'price' => 59.99,
                    'quantity' => 35,
                    'category_id' => 15,
                    'color_id' => 11,
                    'size_id' => 4,
                    'image' => "/storage/product_id_2_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 11,
                    'name' => 'Sleepwear Set',
                    'slug' => 'sleepwear-set',
                    'description' => 'Cozy and soft sleepwear set for a good night\'s sleep.',
                    'excerpt' => 'Includes a comfortable top and matching bottoms.',
                    'price' => 34.99,
                    'quantity' => 45,
                    'category_id' => 16,
                    'color_id' => 7,
                    'size_id' => 3,
                    'image' => "/storage/product_id_3_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 12,
                    'name' => 'Designer Sunglasses',
                    'slug' => 'designer-sunglasses',
                    'description' => 'Stylish and UV-protective sunglasses from a renowned designer.',
                    'excerpt' => 'Elevate your look with these fashionable sunglasses.',
                    'price' => 129.99,
                    'quantity' => 18,
                    'category_id' => 17,
                    'color_id' => 1,
                    'size_id' => 10,
                    'image' => "/storage/product_id_4_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 13,
                    'name' => 'Classic Watch',
                    'slug' => 'classic-watch',
                    'description' => 'Timeless and elegant wristwatch with a leather strap.',
                    'excerpt' => 'A perfect accessory for both formal and casual occasions.',
                    'price' => 89.99,
                    'quantity' => 22,
                    'category_id' => 18,
                    'color_id' => 19,
                    'size_id' => 10,
                    'image' => "/storage/product_id_5_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 14,
                    'name' => 'Winter Scarf',
                    'slug' => 'winter-scarf',
                    'description' => 'Warm and cozy winter scarf for cold weather.',
                    'excerpt' => 'Wrap up in style with this fashionable winter accessory.',
                    'price' => 19.99,
                    'quantity' => 28,
                    'category_id' => 19,
                    'color_id' => 3,
                    'size_id' => 4,
                    'image' => "/storage/product_id_6_product_image",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 15,
                    'name' => 'Leather Belt',
                    'slug' => 'leather-belt',
                    'description' => 'High-quality leather belt with a classic buckle.',
                    'excerpt' => 'Complete your look with this essential accessory.',
                    'price' => 49.99,
                    'quantity' => 32,
                    'category_id' => 20,
                    'color_id' => 10,
                    'size_id' => 3,
                    'image' => "/storage/product_id_7_product_image",
                    'created_at' => Carbon::now()
                ],
             ];

             DB::table("products")->insert($data);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
             DB::table("products")->truncate();
             Schema::enableForeignKeyConstraints();
        });
    }
};
