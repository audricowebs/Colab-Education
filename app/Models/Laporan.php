<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $guarded = [];

    public function pelapor() { return $this->belongsTo(User::class, 'pelapor_id'); }
    public function guru() { return $this->belongsTo(User::class, 'guru_id'); }
}
