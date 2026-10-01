<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_mapel'])]
class Mapel extends Model
{
    protected $table = 'mapel';
    public $timestamps = false;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function tugas(): HasMany {
        return $this->hasMany(Tugas::class);
    }
}
