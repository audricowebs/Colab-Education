<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['tugas_id', 'kelas_id', 'siswa_id', 'kelompok_id', 'link_tugas', 'berkas',
'catatan_siswa', 'waktu_kumpul', 'status', 'nilai', 'rating_murid', 'komentar_guru'])]
class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';

    protected function casts(): array
    {
        return [
            'waktu_kumpul' => 'datetime',
        ];
    }

    public function tugas(): BelongsTo {
        return $this->belongsTo(Tugas::class);
    }

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function siswa(): BelongsTo {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function kelompok(): BelongsTo {
        return $this->belongsTo(Kelompok::class);
    }
}
