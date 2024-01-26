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
        Schema::table('colors', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('colors')->truncate();
            Schema::enableForeignKeyConstraints();

            $data = [
                [
                    'id' => 1,
                    'colorName' => 'Black',
                    'hexCode' => '#000000',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 2,
                    'colorName' => 'White',
                    'hexCode' => '#FFFFFF',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 3,
                    'colorName' => 'Red',
                    'hexCode' => '#FF0000',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 4,
                    'colorName' => 'Green',
                    'hexCode' => '#00FF00',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 5,
                    'colorName' => 'Blue',
                    'hexCode' => '#0000FF',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 6,
                    'colorName' => 'Yellow',
                    'hexCode' => '#FFFF00',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 7,
                    'colorName' => 'Purple',
                    'hexCode' => '#800080',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 8,
                    'colorName' => 'Orange',
                    'hexCode' => '#FFA500',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 9,
                    'colorName' => 'Pink',
                    'hexCode' => '#FFC0CB',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 10,
                    'colorName' => 'Brown',
                    'hexCode' => '#A52A2A',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 11,
                    'colorName' => 'Gray',
                    'hexCode' => '#808080',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 12,
                    'colorName' => 'Teal',
                    'hexCode' => '#008080',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 13,
                    'colorName' => 'Cyan',
                    'hexCode' => '#00FFFF',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 14,
                    'colorName' => 'Magenta',
                    'hexCode' => '#FF00FF',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 15,
                    'colorName' => 'Lime',
                    'hexCode' => '#00FF00',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 16,
                    'colorName' => 'Olive',
                    'hexCode' => '#808000',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 17,
                    'colorName' => 'Charcoal Gray',
                    'hexCode' => '#3C4142',
                    'created_at' => Carbon::now()
                ], 
                [
                    'id' => 18,
                    'colorName' => 'Navy Blue',
                    'hexCode' => '#000080',
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 19,
                    'colorName' => 'Silver',
                    'hexCode' => '#C0C0C0',
                    'created_at' => Carbon::now()
                ]
            ];

            DB::table('colors')->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colors', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table("colors")->truncate();
            Schema::enableForeignKeyConstraints();
        });
    }
};
