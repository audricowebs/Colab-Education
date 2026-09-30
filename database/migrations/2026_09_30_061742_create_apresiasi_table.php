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
    $table->foreignId('karya_id')->constrained('karya')->cascadeOnDelete();
    $table->foreignId('user_id')->constrained('users');
    $table->unsignedTinyInteger('rating');
    $table->text('komentar')->nullable();
    $table->timestamps();
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
