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
        Schema::create('habits', function (Blueprint $table) {
            $table->string('id',12)->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->smallInteger('daily_count');
            $table->string('user_id',13);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['name', 'user_id']); // Fungsi : untuk setiap pengguna, namun satu pengguna diperbolehkan untuk memiliki beberapa kebiasaan dengan nama yang sama.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
