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
        Schema::create('tugas_kelas', function (Blueprint $table) {
    $table->foreignId('tugas_id')->constrained('tugas')->cascadeOnDelete();
    $table->foreignId('kelas_id')->constrained('kelas');
    $table->primary(['tugas_id', 'kelas_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_kelas');
    }
};
