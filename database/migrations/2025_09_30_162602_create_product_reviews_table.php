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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->foreignId('user_id')->constrained('users')->noActionOnDelete();
            $table->foreignId('product_id')->constrained('products')->noActionOnDelete();
            $table->foreignId('variant_id')->constrained('product_variants')->noActionOnDelete();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('review_images', function (Blueprint $table){
            $table->id();
            $table->foreignId('product_review_id')->constrained('product_reviews')->cascadeOnDelete();
            $table->string('image_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
