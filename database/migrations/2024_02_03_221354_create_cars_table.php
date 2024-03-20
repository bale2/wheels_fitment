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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('manufacturer_id')->constrained()->onupdate('cascade')->ondelete('cascade');
            $table->string('car_model');
            $table->integer('engine_size');
            $table->integer('car_year');
            $table->float('center_bore');
            $table->foreignId('nut_bolt_id')->constrained();
            $table->float('mtsurface_fender_distance');
            $table->foreignId('bolt_pattern_id')->constrained();
            $table->boolean('accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
