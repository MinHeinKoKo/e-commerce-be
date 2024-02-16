<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders' , function (Blueprint $table){
            Schema::disableForeignKeyConstraints();
            DB::table('orders')->truncate();
            Schema::enableForeignKeyConstraints();

            $data = [
                [
                    'id' => 1,
                    'user_id' => 3,
                    'product_id' => 2,
                    'quantity' => 5,
                    'price' => 123
                ],
                [
                    'id' => 2,
                    'user_id' => 3,
                    'product_id' => 5,
                    'quantity' => 1,
                    'price' => 21
                ],
                [
                    'id' => 3,
                    'user_id' => 3,
                    'product_id' => 8,
                    'quantity' => 1,
                    'price' => 10
                ],
                [
                    'id' => 4,
                    'user_id' => 3,
                    'product_id' => 11,
                    'quantity' => 1,
                    'price' => 11
                ],
                [
                    'id' => 5,
                    'user_id' => 4,
                    'product_id' => 12,
                    'quantity' => 1,
                    'price' => 12
                ],
                [
                    'id' => 6,
                    'user_id' => 6,
                    'product_id' => 2,
                    'quantity' => 2,
                    'price' => 12.33
                ],
                [
                    'id' => 7,
                    'user_id' => 6,
                    'product_id' => 4,
                    'quantity' => 4,
                    'price' => 125.26
                ],
                [
                    'id' => 8,
                    'user_id' => 7,
                    'product_id' => 1,
                    'quantity' => 3,
                    'price' => 95.63
                ],
                [
                    'id' => 9,
                    'user_id' => 5,
                    'product_id' => 12,
                    'quantity' => 15,
                    'price' => 1231.2
                ],
                [
                    'id' => 10,
                    'user_id' => 5,
                    'product_id' => 1,
                    'quantity' => 1,
                    'price' => 12
                ],
                [
                    'id' => 11,
                    'user_id' => 8,
                    'product_id' => 2,
                    'quantity' => 5,
                    'price' => 123
                ],
                [
                    'id' => 12,
                    'user_id' => 8,
                    'product_id' => 5,
                    'quantity' => 1,
                    'price' => 21
                ],
                [
                    'id' => 13,
                    'user_id' => 8,
                    'product_id' => 8,
                    'quantity' => 1,
                    'price' => 10
                ],
                [
                    'id' => 14,
                    'user_id' => 9,
                    'product_id' => 11,
                    'quantity' => 1,
                    'price' => 11
                ],
                [
                    'id' => 15,
                    'user_id' => 9,
                    'product_id' => 12,
                    'quantity' => 1,
                    'price' => 12
                ],
                [
                    'id' => 16,
                    'user_id' => 9,
                    'product_id' => 2,
                    'quantity' => 2,
                    'price' => 12.33
                ],
                [
                    'id' => 17,
                    'user_id' => 9,
                    'product_id' => 4,
                    'quantity' => 4,
                    'price' => 125.26
                ],
                [
                    'id' => 18,
                    'user_id' => 10,
                    'product_id' => 1,
                    'quantity' => 3,
                    'price' => 95.63
                ],
                [
                    'id' => 19,
                    'user_id' => 10,
                    'product_id' => 12,
                    'quantity' => 15,
                    'price' => 1231.2
                ],
                [
                    'id' => 20,
                    'user_id' => 10,
                    'product_id' => 1,
                    'quantity' => 1,
                    'price' => 12
                ],
            ];
            DB::table('orders')->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table("orders")->truncate();
            Schema::enableForeignKeyConstraints();
        });
    }
};
