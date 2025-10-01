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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->noActionOnDelete();
            $table->foreignId('status_id')->nullable()->constrained('order_statuses')->nullOnDelete();
            $table->unsignedInteger('total_amount');
            $table->unsignedInteger('total_discount');
            $table->foreignId('payment_status_id')->nullable()->constrained('payment_statuses')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_addresses', function (Blueprint $table) {
            $table->foreignUuid('order_id')->constrained('orders')->noActionOnDelete();
            $table->string('mobile_number');
            $table->text('address_line_1');
            $table->text('address_line_2');
            $table->string('thana_or_upozilla');
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->noActionOnDelete();
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->noActionOnDelete();
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('price_at_purchase'); // Snapshot of price
            $table->unsignedInteger('discount_at_purchase'); // Snapshot
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
