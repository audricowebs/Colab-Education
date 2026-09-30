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
        Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->string('password');
    $table->string('role');
    $table->string('nama_lengkap');
    $table->string('rayon')->nullable();
    $table->foreignId('kelas_id')->nullable()->constrained('kelas');
    $table->foreignId('mapel_id')->nullable()->constrained('mapel');
    $table->unique(['mapel_id', 'kelas_id']); // 1 mapel di 1 kelas = 1 guru
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
