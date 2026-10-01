<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        Kelas::create(['nama_kelas' => 'PPLG XI-1']);
        Kelas::create(['nama_kelas' => 'PPLG XI-2']);
        Kelas::create(['nama_kelas' => 'PPLG XI-3']);
        Kelas::create(['nama_kelas' => 'PPLG XI-4']);
        Kelas::create(['nama_kelas' => 'PPLG XI-5']);
    }
}
