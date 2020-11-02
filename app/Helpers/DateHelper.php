<?php


namespace App\Helpers;


use Carbon\Carbon;

class DateHelper
{
    /**
     * @param $date Carbon
     */
    public static function getDateHuman($date)
    {
        if ($date->isToday()) {
            return $date->format('Сегодня в H:i');
        } elseif ($date->isYesterday()) {
            return $date->format('Вчера в H:i');
        } else {
            return $date->format('d-m-Y в H:i');
        }

    }

}
