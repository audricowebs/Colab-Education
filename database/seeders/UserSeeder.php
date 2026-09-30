<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::orderBy('id')->get();
        $mapel = Mapel::orderBy('id')->get();

        // Nama guru per mapel, urutan: XI-1, XI-2, XI-3, XI-4, XI-5
        $guru = [
            'MTK'     => ['Budi Santoso', 'Sri Wahyuni', 'Agus Prasetyo', 'Dewi Lestari', 'Hendra Gunawan'],
            'B.Indo'  => ['Rina Marlina', 'Siti Aminah', 'Yusuf Hidayat', 'Lilis Suryani', 'Dedi Kurniawan'],
            'English' => ['Anita Putri', 'Rizky Ramadhan', 'Maya Kusuma', 'Fajar Nugroho', 'Citra Dewanti'],
            'KIK'     => ['Wahyu Hidayat', 'Nur Aini', 'Bambang Sutrisno', 'Ratna Sari', 'Eko Saputra'],
            'Sejarah' => ['Slamet Riyadi', 'Ani Rahmawati', 'Joko Susilo', 'Endang Purwati', 'Taufik Hidayat'],
            'PAI'     => ['Ahmad Fauzi', 'Siti Khadijah', 'Abdul Rahman', 'Nurul Hidayah', 'Muhammad Iqbal'],
            'PP'      => ['Hartono Wijaya', 'Yuni Astuti', 'Rudi Hermawan', 'Sari Wulandari', 'Andi Setiawan'],
            'PJOK'    => ['Doni Saputra', 'Bayu Aditya', 'Rizal Firmansyah', 'Lukman Hakim', 'Teguh Prabowo'],
            'Koku'    => ['Tri Handayani', 'Puji Lestari', 'Imam Syafii', 'Wati Handayani', 'Arif Budiman'],
            'Prod'    => ['Irfan Maulana', 'Dian Pratiwi', 'Galih Pratama', 'Novi Andriani', 'Reza Pahlevi'],
            'BK'      => ['Ratih Kumala', 'Heri Susanto', 'Lina Marlina', 'Adi Nugraha', 'Susi Susanti'],
        ];

        // Nama murid per kelas (5 murid tiap kelas)
        $murid = [
            ['Audrico Keena Setiadi', 'Bayu Mubiru', 'Dimas Hadi Syandana', 'Albertus Pandu Susanto', 'Farhan Maulana'],
            ['Alya Nurhaliza', 'Raka Pratama', 'Nabila Putri', 'Kevin Anggara', 'Salsabila Azzahra'],
            ['Rafi Ramadhan', 'Zahra Amelia', 'Naufal Hakim', 'Intan Permata', 'Yoga Saputra'],
            ['Aulia Rahma', 'Bagas Wicaksono', 'Melati Kusuma', 'Ilham Fadillah', 'Tiara Anjani'],
            ['Cahya Ningrum', 'Dafa Alfarizi', 'Elsa Safitri', 'Gilang Ramadhan', 'Hana Maharani'],
        ];

        $rayon = ['Cibedug 1', 'Cibedug 2', 'Cisarua 1', 'Ciawi 1', 'Taman Sari 1'];

        // Guru: 1 guru untuk setiap kombinasi mapel + kelas
        foreach ($kelas as $ki => $k) {
            foreach ($mapel as $m) {
                $kode = strtolower(str_replace('.', '', $m->nama_mapel)) . '_xi' . $k->id;

                User::create([
                    'username'     => $kode,
                    'email'        => $kode . '@gmail.com',
                    'password'     => 'password',
                    'role'         => 'guru',
                    'nama_lengkap' => $guru[$m->nama_mapel][$ki],
                    'kelas_id'     => $k->id,
                    'mapel_id'     => $m->id,
                ]);
            }
        }

        // Murid: 5 murid per kelas
        foreach ($kelas as $ki => $k) {
            foreach ($murid[$ki] as $n => $nama) {
                $kode = 'murid' . ($n + 1) . '_xi' . $k->id;

                User::create([
                    'username'     => $kode,
                    'email'        => $kode . '@gmail.com',
                    'password'     => 'password',
                    'role'         => 'murid',
                    'nama_lengkap' => $nama,
                    'rayon'        => $rayon[$n],
                    'kelas_id'     => $k->id,
                    'mapel_id'     => null,
                ]);
            }
        }
    }
}
