<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_kelas'])]
class Kelas extends Model
{
    protected $table = 'kelas';
    public $timestamps = false;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function jadwal(): HasMany {
        return $this->hasMany(Jadwal::class);
    }

    public function tugas(): BelongsToMany {
        return $this->belongsToMany(Tugas::class, 'tugas_kelas');
    }
}
