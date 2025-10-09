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
        Schema::create('seller_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('seller_id')->constrained('sellers')->noActionOnDelete();
            $table->string('mobile_number');
            $table->text('address_line_1');
            $table->text('address_line_2');
            $table->string('is_thana');
            $table->string('thana_or_upozilla');
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_addresses');
    }
};
