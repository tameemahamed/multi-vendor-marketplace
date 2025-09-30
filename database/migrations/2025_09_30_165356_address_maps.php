<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * migrations for divisions, districts, thanas, upozillas
     */
    public function up(): void
    {
        //
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->string('name');
        });

        Schema::create('thanas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->string('name');
        });

        Schema::create('upozillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
