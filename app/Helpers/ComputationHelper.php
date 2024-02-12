<?php

namespace App\Helpers;

use Carbon\Carbon;

function computeBorrowedHours($startDate, $endDate)
{
    $startDateTime  = Carbon::parse($startDate);
    $endDateTime    = Carbon::parse($endDate);

    $borrowedSeconds = $endDateTime->diffInSeconds($startDateTime);

    return $borrowedSeconds;
}
