<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $guarded = [];
    public $timestamps = false;

    public function users() { return $this->hasMany(User::class); }
    public function tugas() { return $this->hasMany(Tugas::class); }
}
