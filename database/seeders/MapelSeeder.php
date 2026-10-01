<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        // id otomatis: MTK=1, B.Indo=2, English=3, KIK=4, Sejarah=5, PAI=6,
        // PP=7, PJOK=8, Koku=9, Prod=10, BK=11
        Mapel::create(['nama_mapel' => 'MTK']);
        Mapel::create(['nama_mapel' => 'B.Indo']);
        Mapel::create(['nama_mapel' => 'English']);
        Mapel::create(['nama_mapel' => 'KIK']);
        Mapel::create(['nama_mapel' => 'Sejarah']);
        Mapel::create(['nama_mapel' => 'PAI']);
        Mapel::create(['nama_mapel' => 'PP']);
        Mapel::create(['nama_mapel' => 'PJOK']);
        Mapel::create(['nama_mapel' => 'Koku']);
        Mapel::create(['nama_mapel' => 'Prod']);
        Mapel::create(['nama_mapel' => 'BK']);
    }
}
