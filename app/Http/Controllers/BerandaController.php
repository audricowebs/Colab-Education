<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Pengumpulan;
use App\Models\Tugas;

class BerandaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'murid') {
            $totalTugas = Tugas::whereHas('kelas', fn ($q) => $q->where('kelas.id', $user->kelas_id))->count();
            $selesai    = Pengumpulan::where('siswa_id', $user->id)->count();
            $rata       = Pengumpulan::where('siswa_id', $user->id)->whereNotNull('nilai')->avg('nilai');

            $kartu = [
                ['Tugas Pending', max(0, $totalTugas - $selesai), 'Tugas yang belum dikumpulkan'],
                ['Tugas Selesai', $selesai, 'Tugas yang sudah dikumpulkan'],
                ['Kelompok Belajar', $user->kelompok()->count(), 'Jumlah kelompok yang diikuti'],
                ['Rating Anda', $rata ? round($rata) : '-', 'Rata-rata nilai tugas'],
            ];
        } else {
            $milikGuru = fn ($q) => $q->where('guru_id', $user->id);
            $dinilai   = Pengumpulan::whereNotNull('nilai')->whereHas('tugas', $milikGuru);

            $kartu = [
                ['Tugas Dibuat', $user->tugas()->count(), 'Tugas yang Anda buat'],
                ['Tugas Dinilai', (clone $dinilai)->count(), 'Pengumpulan yang sudah dinilai'],
                ['Kelompok Belajar', Kelompok::whereHas('tugas', $milikGuru)->count(), 'Kelompok yang Anda buat'],
                ['Rata-rata Nilai', ($r = (clone $dinilai)->avg('nilai')) ? round($r) : '-', 'Rata-rata nilai murid'],
            ];
        }

        // Jadwal mingguan (guru hanya melihat jadwal mapelnya)
        $jadwal = Jadwal::with('mapel')
            ->where('kelas_id', $user->kelas_id)
            ->when($user->role === 'guru', fn ($q) => $q->where('mapel_id', $user->mapel_id))
            ->orderBy('jam_mulai')
            ->get();

        $slot = fn ($j) => substr($j->jam_mulai, 0, 5) . ' - ' . substr($j->jam_selesai, 0, 5);

        $slots = $jadwal->map($slot)->unique()->values();
        $grid  = [];
        foreach ($jadwal as $j) {
            $grid[$slot($j)][$j->hari] = $j->mapel->nama_mapel;
        }

        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        return view('beranda', compact('kartu', 'slots', 'grid', 'hari'));
    }
}
