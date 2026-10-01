<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'judul', 'deskripsi', 'tautan', 'berkas'])]
class Karya extends Model
{
    protected $table = 'karya';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function apresiasi(): HasMany {
        return $this->hasMany(Apresiasi::class);
    }
}
