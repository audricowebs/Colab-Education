<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelompok;
use App\Models\Pengumpulan;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function murid()
    {
        $user = Auth::user();

        // ---------- 4 kartu ringkasan ----------
        // semua tugas yang ditujukan ke kelas murid
        $semuaTugas = $user->kelas->tugas->count();
        // tugas yang sudah dikumpulkan murid
        $tugasSelesai = Pengumpulan::where('siswa_id', $user->id)->count();
        // sisanya berarti pending
        $tugasPending = $semuaTugas - $tugasSelesai;
        // jumlah kelompok yang diikuti
        $kelompok = $user->kelompok->count();
        // rata-rata nilai (avg mengabaikan nilai kosong)
        $rataNilai = Pengumpulan::where('siswa_id', $user->id)->avg('nilai');
        if ($rataNilai) {
            $rating = round($rataNilai);
        } else {
            $rating = '-';
        }

        // ---------- jadwal per hari (urut dari jam paling pagi) ----------
        $senin = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Senin')->orderBy('jam_mulai')->get();
        $selasa = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Selasa')->orderBy('jam_mulai')->get();
        $rabu = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Rabu')->orderBy('jam_mulai')->get();
        $kamis = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Kamis')->orderBy('jam_mulai')->get();
        $jumat = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Jumat')->orderBy('jam_mulai')->get();

        return view('murid.beranda', compact('tugasPending', 'tugasSelesai', 'kelompok', 'rating',
            'senin', 'selasa', 'rabu', 'kamis', 'jumat'));
    }

    public function guru()
    {
        $user = Auth::user();

        // ---------- 4 kartu ringkasan ----------
        // id semua tugas yang dibuat guru ini
        $idTugas = Tugas::where('guru_id', $user->id)->pluck('id');
        $tugasDibuat = $idTugas->count();
        $tugasDinilai = Pengumpulan::whereIn('tugas_id', $idTugas)->whereNotNull('nilai')->count();
        $kelompokDibuat = Kelompok::whereIn('tugas_id', $idTugas)->count();
        $rataNilai = Pengumpulan::whereIn('tugas_id', $idTugas)->whereNotNull('nilai')->avg('nilai');
        if ($rataNilai) {
            $rekap = round($rataNilai);
        } else {
            $rekap = '-';
        }

        // ---------- jadwal kelas guru ----------
        $senin = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Senin')->orderBy('jam_mulai')->get();
        $selasa = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Selasa')->orderBy('jam_mulai')->get();
        $rabu = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Rabu')->orderBy('jam_mulai')->get();
        $kamis = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Kamis')->orderBy('jam_mulai')->get();
        $jumat = Jadwal::with('mapel')->where('kelas_id', $user->kelas_id)->where('hari', 'Jumat')->orderBy('jam_mulai')->get();

        return view('guru.beranda', compact('tugasDibuat', 'tugasDinilai', 'kelompokDibuat', 'rekap',
            'senin', 'selasa', 'rabu', 'kamis', 'jumat'));
    }
}
