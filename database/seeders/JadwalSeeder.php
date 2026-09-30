<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $hari  = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $sesi  = [['07:00', '08:30'], ['08:30', '10:00'], ['10:15', '11:45']];
        $mapel = Mapel::pluck('id')->values();

        foreach (Kelas::all() as $k) {
            $i = $k->id; // supaya urutan mapel tiap kelas berbeda

            foreach ($hari as $h) {
                foreach ($sesi as [$mulai, $selesai]) {
                    Jadwal::create([
                        'kelas_id'    => $k->id,
                        'mapel_id'    => $mapel[$i % $mapel->count()],
                        'hari'        => $h,
                        'jam_mulai'   => $mulai,
                        'jam_selesai' => $selesai,
                    ]);
                    $i++;
                }
            }
        }
    }
}
