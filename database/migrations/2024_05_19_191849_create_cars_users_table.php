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

            $table->foreignUuid('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('wheels_users.users')
                // ->onupdate('cascade')
                ->ondelete('cascade');

            $table->foreignUuid('car_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



            $table->foreign('car_id')
                ->references('id')->on('cars')
                // ->onupdate('cascade')
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
