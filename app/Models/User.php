<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['username', 'email', 'password', 'role', 'nama_lengkap', 'rayon', 'kelas_id', 'mapel_id'])]
#[Hidden(['password'])]
class User extends Authenticatable
{
    // tabel users tidak punya created_at & updated_at
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(): BelongsTo {
        return $this->belongsTo(Mapel::class);
    }

    public function tugas(): HasMany {
        return $this->hasMany(Tugas::class, 'guru_id');
    }

    public function pengumpulan(): HasMany {
        return $this->hasMany(Pengumpulan::class, 'siswa_id');
    }

    public function karya(): HasMany {
        return $this->hasMany(Karya::class);
    }

    public function kelompok(): BelongsToMany {
        return $this->belongsToMany(Kelompok::class, 'anggota_kelompok');
    }

    public function laporanDikirim(): HasMany {
        return $this->hasMany(Laporan::class, 'pelapor_id');
    }

    public function laporanDiterima(): HasMany {
        return $this->hasMany(Laporan::class, 'guru_id');
    }
}
