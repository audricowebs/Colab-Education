<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ===== GURU (kelas_id dan mapel_id terisi, rayon kosong) =====
        User::create([
            'username' => 'mtk_xi1',
            'email' => 'mtk_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'nama_lengkap' => 'Budi Santoso',
            'kelas_id' => 1,
            'mapel_id' => 1,
        ]);
        User::create([
            'username' => 'prod_xi1',
            'email' => 'prod_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'nama_lengkap' => 'Irfan Maulana',
            'kelas_id' => 1,
            'mapel_id' => 10,
        ]);

        // ===== MURID (kelas_id dan rayon terisi, mapel_id kosong) =====
        User::create([
            'username' => 'murid1_xi1',
            'email' => 'murid1_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
            'nama_lengkap' => 'Audrico Keena Setiadi',
            'rayon' => 'Cibedug 1',
            'kelas_id' => 1,
        ]);
        User::create([
            'username' => 'murid2_xi1',
            'email' => 'murid2_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
            'nama_lengkap' => 'Bayu Mubiru',
            'rayon' => 'Cibedug 2',
            'kelas_id' => 1,
        ]);
        User::create([
            'username' => 'murid3_xi1',
            'email' => 'murid3_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
            'nama_lengkap' => 'Dimas Hadi Syandana',
            'rayon' => 'Cisarua 1',
            'kelas_id' => 1,
        ]);
        User::create([
            'username' => 'murid4_xi1',
            'email' => 'murid4_xi1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
            'nama_lengkap' => 'Albertus Pandu Susanto',
            'rayon' => 'Ciawi 1',
            'kelas_id' => 1,
        ]);
    }
}
