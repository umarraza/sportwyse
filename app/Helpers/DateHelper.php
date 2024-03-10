<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class DateHelper
{
    static function parseDate($date) 
    {
        $formats = [
            'D M d Y H:i:s e+', // Day, Month, Date, Year, Time, Timezone
            'Y-m-d',            // Year, Month, Day
            'Y-m-d\TH:i:s.u\Z', // ISO 8601 format with milliseconds and Zulu time zone
        ];
    
        foreach ($formats as $format) {
            try {
                $parsedDate = Carbon::createFromFormat($format, $date);
                if ($parsedDate !== false) {
                    return $parsedDate;
                }
            } catch (\Throwable $th) {

                Log::error("Failed to parse date with format $format");
            }
        }
    
        return null;
    }
}