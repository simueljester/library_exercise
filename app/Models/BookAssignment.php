<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BookAssignment extends Model
{
    use HasFactory;

    protected $casts = [
        'returned_at' => 'datetime',
    ];


    protected $fillable = [
        'book_id',
        'library_id',
        'user_id',
        'returned_at',
        'borrowed_seconds'
    ];


    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }


    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function getFormattedBorrowedTimeAttribute()
    {

        $seconds = $this->borrowed_seconds;

        $hours = floor($seconds / 3600);
        $remainingSeconds = $seconds % 3600;

        $minutes = floor($remainingSeconds / 60);

        return "Hours: " . $hours . ", Minutes: " . $minutes;

    }


}
