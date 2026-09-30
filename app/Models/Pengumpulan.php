<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';
    protected $guarded = [];
    protected $casts = ['waktu_kumpul' => 'datetime'];

    public function tugas() { return $this->belongsTo(Tugas::class); }
    public function siswa() { return $this->belongsTo(User::class, 'siswa_id'); }
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function kelompok() { return $this->belongsTo(Kelompok::class); }
}

