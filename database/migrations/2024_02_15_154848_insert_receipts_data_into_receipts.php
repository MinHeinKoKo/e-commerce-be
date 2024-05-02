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
        DB::table("receipts")->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'id' => 1,
                'user_id' => 3,
                'process' => "Approved",
                'total' => 135.63,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'process' => "Denied",
                'total' => 12.36,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 6,
                'process' => "Pending",
                'total' => 526.36,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 7,
                'process' => "Cancel",
                'total' => 95.63,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'process' => "Cancel",
                'total' => 15234.12,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'user_id' => 8,
                'process' => "Pending",
                'total' => 180.12,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'user_id' => 9,
                'process' => "Approved",
                'total' => 184.36,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'user_id' => 10,
                'process' => "Pending",
                'total' => 563.01,
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('receipts')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table("receipts")->truncate();
        Schema::enableForeignKeyConstraints();
    }
};
