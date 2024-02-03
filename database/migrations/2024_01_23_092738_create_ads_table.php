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
        Schema::create('ads', function (Blueprint $table) {
            $table->id('id');
            $table->integer('wheel_id');
            $table->string('title');
            $table->string('description', 2048);
            $table->float('price', 8, 2);
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('place');
            $table->string('photo');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
