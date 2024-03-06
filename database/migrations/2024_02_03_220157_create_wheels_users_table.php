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
        Schema::create('wheels_users', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')
                ->constrained('wheels_users.users')
                ->onupdate('cascade')
                ->ondelete('cascade');
            $table->foreignUuid('wheel_id')
                ->constrained()
                ->onupdate('cascade')
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
        Schema::dropIfExists('wheels_users');
    }
};
