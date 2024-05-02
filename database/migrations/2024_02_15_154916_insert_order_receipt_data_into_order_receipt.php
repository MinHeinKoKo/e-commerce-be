<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table("order_receipt")->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'id' => 1,
                'order_id' => 1,
                'receipt_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'receipt_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'order_id' => 3,
                'receipt_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'order_id' => 4,
                'receipt_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'order_id' => 5,
                'receipt_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'order_id' => 6,
                'receipt_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'order_id' => 7,
                'receipt_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'order_id' => 8,
                'receipt_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'order_id' => 9,
                'receipt_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'order_id' => 10,
                'receipt_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'order_id' => 11,
                'receipt_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'order_id' => 12,
                'receipt_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'order_id' => 13,
                'receipt_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'order_id' => 14,
                'receipt_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'order_id' => 15,
                'receipt_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'order_id' => 16,
                'receipt_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'order_id' => 17,
                'receipt_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'order_id' => 18,
                'receipt_id' => 8,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'order_id' => 19,
                'receipt_id' => 8,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'order_id' => 20,
                'receipt_id' => 8,
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('order_receipt')->insert($data);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table("order_receipt")->truncate();
        Schema::enableForeignKeyConstraints();
    }
};
