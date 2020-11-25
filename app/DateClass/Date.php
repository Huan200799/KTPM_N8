<?php

namespace App\DateClass;

/**
 * summary
 */
class Date
{
    public static function getListDayInMonth(){
        $arrayDay = [];
        $month = date('m');
        $year = date('Y');

        for ($day = 1; $day <=31 ; $day++) {
            $item = mktime(12, 0, 0, $month, $day ,$year);
            if(date('m', $item) == $month)
                $arrayDay[] = date('Y-m-d', $item);
        }

        return $arrayDay;
    }
}

