<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'rating'];

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
