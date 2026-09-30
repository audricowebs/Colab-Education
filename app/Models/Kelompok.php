<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';
    protected $guarded = [];

    public function tugas() { return $this->belongsTo(Tugas::class); }
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
    public function anggota() { return $this->belongsToMany(User::class, 'anggota_kelompok'); }
    public function pengumpulan() { return $this->hasMany(Pengumpulan::class); }
}
