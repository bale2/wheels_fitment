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
        Schema::create('cars_users', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')
                ->constrained('wheels_users.users')
                ->onupdate('cascade')
                ->ondelete('cascade');
            $table->foreignUuid('car_id')
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
        Schema::dropIfExists('cars_users');
    }
};
