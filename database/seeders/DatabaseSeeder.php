<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // urutan penting: kelas & mapel harus ada dulu sebelum user dan jadwal
        $this->call([
            KelasSeeder::class,
            MapelSeeder::class,
            UserSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
