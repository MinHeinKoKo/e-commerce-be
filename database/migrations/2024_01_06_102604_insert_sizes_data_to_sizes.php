<?php

use Carbon\Carbon;
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
        Schema::table('sizes', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('sizes')->truncate();
            Schema::enableForeignKeyConstraints();

            $data = [
                [
                    'id' => 1 ,
                    'sizeName' => "XS",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 2 ,
                    'sizeName' => "S",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 3 ,
                    'sizeName' => "M",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 4 ,
                    'sizeName' => "L",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 5 ,
                    'sizeName' => "X",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 6 ,
                    'sizeName' => "XL",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 7 ,
                    'sizeName' => "XXL",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 8 ,
                    'sizeName' => "XXXL",
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 9,
                    'sizeName' => "XXXXL",
                    'created_at' => Carbon::now()
                ],[
                    'id' => 10,
                    'sizeName' => "One Size",
                    'created_at' => Carbon::now()
                ]
            ];

            DB::table('sizes')->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sizes', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('sizes')->truncate();
            Schema::enableForeignKeyConstraints();
        });
    }
};
