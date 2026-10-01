<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['karya_id', 'user_id', 'rating', 'komentar'])]
class Apresiasi extends Model
{
    protected $table = 'apresiasi';

    public function karya(): BelongsTo {
        return $this->belongsTo(Karya::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
