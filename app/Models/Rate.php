<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
