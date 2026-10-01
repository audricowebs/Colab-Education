<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['tugas_id', 'kelas_id', 'mapel_id', 'nomor', 'deskripsi'])]
class Kelompok extends Model
{
    protected $table = 'kelompok';

    public function tugas(): BelongsTo {
        return $this->belongsTo(Tugas::class);
    }

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(): BelongsTo {
        return $this->belongsTo(Mapel::class);
    }

    public function anggota(): BelongsToMany {
        return $this->belongsToMany(User::class, 'anggota_kelompok');
    }

    public function pengumpulan(): HasMany {
        return $this->hasMany(Pengumpulan::class);
    }
}
