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
        Schema::table('users', function (Blueprint $table) {
    // nullable karena murid tidak punya mapel_id
    $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');
    $table->foreignId('mapel_id')->nullable()->constrained('mapel')->onDelete('set null');
    // 1 mapel di 1 kelas hanya 1 guru
    $table->unique(['mapel_id', 'kelas_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
    $table->dropForeign(['kelas_id']);
    $table->dropForeign(['mapel_id']);
    $table->dropUnique(['mapel_id', 'kelas_id']);
    $table->dropColumn(['kelas_id', 'mapel_id']);
});
    }
};
