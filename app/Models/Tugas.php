<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['guru_id', 'mapel_id', 'judul', 'jenis', 'tenggat', 'deskripsi'])]
class Tugas extends Model
{
    protected $table = 'tugas';

    protected function casts(): array
    {
        return [
            'tenggat' => 'datetime',
        ];
    }

    public function guru(): BelongsTo {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function mapel(): BelongsTo {
        return $this->belongsTo(Mapel::class);
    }

    public function kelas(): BelongsToMany {
        return $this->belongsToMany(Kelas::class, 'tugas_kelas');
    }

    public function kelompok(): HasMany {
        return $this->hasMany(Kelompok::class);
    }

    public function pengumpulan(): HasMany {
        return $this->hasMany(Pengumpulan::class);
    }
}
