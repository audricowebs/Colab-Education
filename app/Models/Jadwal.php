<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['kelas_id', 'mapel_id', 'hari', 'jam_mulai', 'jam_selesai'])]
class Jadwal extends Model
{
    protected $table = 'jadwal';
    public $timestamps = false;

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(): BelongsTo {
        return $this->belongsTo(Mapel::class);
    }
}
