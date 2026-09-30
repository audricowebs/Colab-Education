<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['PPLG XI-1', 'PPLG XI-2', 'PPLG XI-3', 'PPLG XI-4', 'PPLG XI-5'] as $nama) {
            Kelas::create(['nama_kelas' => $nama]);
        }
    }
}
