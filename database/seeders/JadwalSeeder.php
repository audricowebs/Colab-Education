<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        // kelas_id 1 = PPLG XI-1. mapel_id lihat MapelSeeder
        // SENIN
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 1, 'hari' => 'Senin', 'jam_mulai' => '07:00', 'jam_selesai' => '08:30']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 3, 'hari' => 'Senin', 'jam_mulai' => '08:30', 'jam_selesai' => '10:00']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 2, 'hari' => 'Senin', 'jam_mulai' => '10:15', 'jam_selesai' => '11:45']);
        // SELASA
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 10, 'hari' => 'Selasa', 'jam_mulai' => '07:00', 'jam_selesai' => '08:30']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 10, 'hari' => 'Selasa', 'jam_mulai' => '08:30', 'jam_selesai' => '10:00']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 4, 'hari' => 'Selasa', 'jam_mulai' => '10:15', 'jam_selesai' => '11:45']);
        // RABU
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 5, 'hari' => 'Rabu', 'jam_mulai' => '07:00', 'jam_selesai' => '08:30']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 6, 'hari' => 'Rabu', 'jam_mulai' => '08:30', 'jam_selesai' => '10:00']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 7, 'hari' => 'Rabu', 'jam_mulai' => '10:15', 'jam_selesai' => '11:45']);
        // KAMIS
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 8, 'hari' => 'Kamis', 'jam_mulai' => '07:00', 'jam_selesai' => '08:30']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 9, 'hari' => 'Kamis', 'jam_mulai' => '08:30', 'jam_selesai' => '10:00']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 11, 'hari' => 'Kamis', 'jam_mulai' => '10:15', 'jam_selesai' => '11:45']);
        // JUMAT
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 1, 'hari' => 'Jumat', 'jam_mulai' => '07:00', 'jam_selesai' => '08:30']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 2, 'hari' => 'Jumat', 'jam_mulai' => '08:30', 'jam_selesai' => '10:00']);
        Jadwal::create(['kelas_id' => 1, 'mapel_id' => 3, 'hari' => 'Jumat', 'jam_mulai' => '10:15', 'jam_selesai' => '11:45']);
    }
}
