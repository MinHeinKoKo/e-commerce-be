<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('users')->truncate();
            Schema::enableForeignKeyConstraints();
            $data = [
                [
                    'id' => 1,
                    'name' => 'Min Hein',
                    'email' => 'admin@e-commerce.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "admin_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "admin city",
                    'role' => 'admin',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 2,
                    'name' => 'Lusica',
                    'email' => 'editor@e-commerce.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "editor_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "editor city",
                    'role' => 'admin',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 3,
                    'name' => 'U Ba',
                    'email' => 'uba@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "testuser_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "uba city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 4,
                    'name' => 'Maung Maung',
                    'email' => 'maungmaung@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "testuser_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "Ok par city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 5,
                    'name' => 'Morea',
                    'email' => 'morea@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "editor_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "editor city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 6,
                    'name' => 'Ko Ko',
                    'email' => 'koko@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "admin_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "admin city",
                    'role' => 'admin',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 7,
                    'name' => 'Torres',
                    'email' => 'torres@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "editor_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "editor city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 8,
                    'name' => 'Kyaw Kyaw',
                    'email' => 'kyawkyaw@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "testuser_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "uba city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 9,
                    'name' => 'Hla Hla',
                    'email' => 'hlahla@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "testuser_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "Ok par city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ],
                [
                    'id' => 10,
                    'name' => 'Sica',
                    'email' => 'sica@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'email_verification_token' => "editor_autopass",
                    'password' => Hash::make("password"),
                    'phone' => "+22-123-456-789",
                    'address' => "editor city",
                    'role' => 'user',
                    'is_active' => true,
                    'created_at' => Carbon::now()
                ]
            ];

            DB::table('users')->insert($data);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            DB::table('users')->truncate();
            Schema::enableForeignKeyConstraints();
        });
    }
};
