<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['username', 'email', 'password', 'role', 'nama_lengkap', 'rayon', 'kelas_id', 'mapel_id'])]
#[Hidden(['password'])]
class User extends Authenticatable
{
    public $timestamps = false;

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
    public function tugas() { return $this->hasMany(Tugas::class, 'guru_id'); }
    public function pengumpulan() { return $this->hasMany(Pengumpulan::class, 'siswa_id'); }
    public function karya() { return $this->hasMany(Karya::class); }
    public function kelompok() { return $this->belongsToMany(Kelompok::class, 'anggota_kelompok'); }
    public function laporanDikirim() { return $this->hasMany(Laporan::class, 'pelapor_id'); }
    public function laporanDiterima() { return $this->hasMany(Laporan::class, 'guru_id'); }
}
