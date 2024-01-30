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
            // $table->unsignedBigInteger('wheel_id');
            // $table->foreign('wheel_id')->references('id')->on('wheels');
            $table->integer('wheel_id');
            // ezt később cserélni kell idegen kulcsra
            $table->string('title');
            $table->string('description', 2048);
            $table->float('price', 8, 2);
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //
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
