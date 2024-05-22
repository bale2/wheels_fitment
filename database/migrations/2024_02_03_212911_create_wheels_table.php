<?php


use Carbon\Carbon;
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
        Schema::create('wheels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('manufacturer_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('manufacturer_id')
                // ->constrained()
                ->references('id')->on('manufacturers')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->string('model', 255);
            $table->float('price');

            $table->foreignId('wheel_type_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('wheel_type_id')
                // ->constrained()
                ->references('id')->on('wheel_types')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->integer('diameter');
            $table->float('width');
            $table->integer('ET_number');

            $table->foreignId('bolt_pattern_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('bolt_pattern_id')
                // ->constrained()
                ->references('id')->on('bolt_patterns')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->string('kba_number')->nullable();
            $table->float('center_bore');


            $table->foreignId('nut_bolt_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->foreign('nut_bolt_id')
                // ->constrained()
                ->references('id')->on('nut_bolts')
                // ->onupdate('cascade')
                ->ondelete('cascade');
            $table->boolean('multipiece');
            $table->string('photo');
            $table->string('note', 512);
            $table->boolean('accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wheels');
    }
};
