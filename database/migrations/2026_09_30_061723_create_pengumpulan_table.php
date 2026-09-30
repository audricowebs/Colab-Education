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
        Schema::create('pengumpulan', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tugas_id')->constrained('tugas');
    $table->foreignId('kelas_id')->constrained('kelas');
    $table->foreignId('siswa_id')->constrained('users');
    $table->foreignId('kelompok_id')->nullable()->constrained('kelompok');
    $table->string('link_tugas')->nullable();
    $table->string('berkas')->nullable();
    $table->text('catatan_siswa')->nullable();
    $table->dateTime('waktu_kumpul');
    $table->string('status');
    $table->decimal('nilai', 5, 2)->nullable();
    $table->unsignedTinyInteger('rating_murid')->nullable();
    $table->text('komentar_guru')->nullable();
    $table->timestamps();
    $table->unique(['tugas_id', 'siswa_id']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan');
    }
};
