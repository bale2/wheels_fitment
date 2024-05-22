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
        Schema::create('wheels_cars', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('car_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->foreign('car_id')
                // ->constrained()
                ->references('id')->on('cars')
                // ->onupdate('cascade')
                ->ondelete('cascade');


            $table->foreignUuid('wheel_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('wheel_id')
                ->references('id')->on('wheels')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->boolean('accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wheels_cars');
    }
};
