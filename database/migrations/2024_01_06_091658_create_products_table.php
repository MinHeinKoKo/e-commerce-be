<?php

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
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->longText("description");
            $table->text("excerpt");
            $table->decimal("price", 8, 2);
            $table->integer("quantity");
            $table->string("image")->nullable();
            $table->boolean("is_published")->default(true);
            $table->boolean("is_visible")->default(true);
            $table->foreignId("category_id")->constrained("categories")->cascadeOnDelete();
            $table->foreignId("color_id")->constrained("colors")->cascadeOnDelete();
            $table->foreignId("size_id")->constrained("sizes")->cascadeOnDelete();
//            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
