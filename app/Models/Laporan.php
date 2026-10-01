<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['pelapor_id', 'guru_id', 'jenis_masalah', 'deskripsi',
'telp_pelapor', 'telp_pelaku', 'bukti_png'])]
class Laporan extends Model
{
    protected $table = 'laporan';

    public function pelapor(): BelongsTo {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    public function guru(): BelongsTo {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
