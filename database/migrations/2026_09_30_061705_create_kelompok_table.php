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
        Schema::create('kelompok', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tugas_id')->constrained('tugas');
    $table->foreignId('kelas_id')->constrained('kelas');
    $table->foreignId('mapel_id')->constrained('mapel');
    $table->unsignedInteger('nomor');
    $table->text('deskripsi');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok');
    }
};
