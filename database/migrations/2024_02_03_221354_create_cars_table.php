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


            $table->foreignUuid('manufacturer_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->string('car_model');
            $table->integer('engine_size');
            $table->integer('car_year');
            $table->float('center_bore');



            $table->foreignId('nut_bolt_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->foreign('nut_bolt_id')
                ->references('id')
                ->on('nut_bolts')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->float('mtsurface_fender_distance');



            $table->foreignId('bolt_pattern_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('bolt_pattern_id')
                ->references('id')
                ->on('bolt_patterns')
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
        Schema::dropIfExists('cars');
    }
};
