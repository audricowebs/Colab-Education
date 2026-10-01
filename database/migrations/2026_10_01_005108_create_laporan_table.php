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
        Schema::create('laporan', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pelapor_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
    $table->string('jenis_masalah');
    $table->text('deskripsi');
    $table->string('telp_pelapor');
    $table->string('telp_pelaku')->nullable();
    $table->string('bukti_png')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
