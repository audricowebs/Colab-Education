<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $guarded = [];
    protected $casts = ['tenggat' => 'datetime'];

    public function guru() { return $this->belongsTo(User::class, 'guru_id'); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
    public function kelas() { return $this->belongsToMany(Kelas::class, 'tugas_kelas'); }
    public function kelompok() { return $this->hasMany(Kelompok::class); }
    public function pengumpulan() { return $this->hasMany(Pengumpulan::class); }
}
