<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id',
        'book_id',
        'availability'
    ];

    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

}
