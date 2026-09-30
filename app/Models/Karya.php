<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karya';
    protected $guarded = [];

    public function user() { return $this->belongsTo(User::class); }
    public function apresiasi() { return $this->hasMany(Apresiasi::class); }
}
