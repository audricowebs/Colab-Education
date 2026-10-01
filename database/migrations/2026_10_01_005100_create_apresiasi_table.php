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
        Schema::create('apresiasi', function (Blueprint $table) {
    $table->id();
    $table->foreignId('karya_id')->constrained('karya')->onDelete('cascade');
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->integer('rating');
    $table->text('komentar')->nullable();
    $table->timestamps();
    // 1 pengguna hanya 1 apresiasi untuk 1 karya
    $table->unique(['karya_id', 'user_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apresiasi');
    }
};
