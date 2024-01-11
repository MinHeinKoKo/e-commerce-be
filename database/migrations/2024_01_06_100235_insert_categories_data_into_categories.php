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
        Schema::table("categories", function(Blueprint $table){
            Schema::disableForeignKeyConstraints();
            DB::table("categories")->truncate();
            Schema::enableForeignKeyConstraints();
            $data = [
                [
                    'id' => 1,
                    'title' => "T-Shirt",
                    'slug' => "T-Shirt",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 2,
                    'title' => "Polo Shirt",
                    'slug' => "poloShirt",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 3,
                    'title' => "Women's Clothing",
                    'slug' => "womens-clothing",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 4,
                    'title' => "Kids' Clothing",
                    'slug' => "kids-clothing",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 5,
                    'title' => "Footwear",
                    'slug' => "footwear",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 6,
                    'title' => "Sports & Activewear",
                    'slug' => "sports-activewear",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 7,
                    'title' => "Seasonal Collections",
                    'slug' => "seasonal-collections",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 8,
                    'title' => "Uniforms & Workwear",
                    'slug' => "uniforms-workwear",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 9,
                    'title' => "Ethnic & Traditional Wear",
                    'slug' => "ethnic-traditional-wear",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 10,
                    'title' => "Jean",
                    'slug' => "jeans",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 11,
                    'title' => "Bags & Backpacks",
                    'slug' => "bags&Backpacks",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 12,
                    'title' => "Suit",
                    'slug' => "suit",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 13,
                    'title' => "Dress",
                    'slug' => "dress",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 14,
                    'title' => "Jackets & Coats",
                    'slug' => "jackets&Coats",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 15,
                    'title' => "Sneakers",
                    'slug' => "sneakers",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 16,
                    'title' => "Sleepwear",
                    'slug' => "sleepwear",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 17,
                    'title' => "Accessories",
                    'slug' => "accessories",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 18,
                    'title' => "Watches",
                    'slug' => "watches",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 19,
                    'title' => "Scarves & Wraps",
                    'slug' => "scarves&Wraps",
                    'created_at' => Carbon::now(),
                ],
                [
                    'id' => 20,
                    'title' => "Belts",
                    'slug' => "belts",
                    'created_at' => Carbon::now(),
                ]
            ];

            DB::table("categories")->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('categories')->truncate();
            Schema::enableForeignKeyConstraints();
        });
    }
};
