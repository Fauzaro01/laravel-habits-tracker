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
        Schema::create('habits_logs', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->date('date');
            $table->string('user_id', 13);
            $table->string('habit_id', 12);
            $table->foreign('habit_id')->references('id')->on('habits')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits_logs');
    }
};
