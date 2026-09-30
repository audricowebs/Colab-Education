<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = ['MTK', 'B.Indo', 'English', 'KIK', 'Sejarah', 'PAI', 'PP', 'PJOK', 'Koku', 'Prod', 'BK'];

        foreach ($daftar as $nama) {
            Mapel::create(['nama_mapel' => $nama]);
        }
    }
}
