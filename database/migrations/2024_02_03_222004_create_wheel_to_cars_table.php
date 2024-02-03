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
        Schema::create('wheel_to_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')
                    ->constrained()
                    ->onupdate('cascade')
                    ->ondelete('cascade');
            $table->foreignId('wheel_id')
                    ->constrained()
                    ->onupdate('cascade')
                    ->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wheel_to_cars');
    }
};
