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
        // gabungan jam mulai dan jam selesai, contoh: 07:00 - 08:30
    public function getJamAttribute()
    {
        return substr($this->jam_mulai, 0, 5) . ' - ' . substr($this->jam_selesai, 0, 5);
    }
}
