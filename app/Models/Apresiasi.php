<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apresiasi extends Model
{
    protected $table = 'apresiasi';
    protected $guarded = [];

    public function karya() { return $this->belongsTo(Karya::class); }
    public function user() { return $this->belongsTo(User::class); }
}
