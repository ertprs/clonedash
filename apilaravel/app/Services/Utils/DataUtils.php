<?php

namespace App\Services\Utils;

use App\Exceptions\ApiWebControlException;
use DateTime;

/**
 * @author Tiago Franco
 * Helper para valiaar datas 
 */
class DataUtils
{

    const YMD = "Y-m-d H:i:s";
    const DMY = "d/m/Y H:i:s";


    public static function isAM($date, $format = self::YMD)
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function isBR($date, $format = self::DMY)
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function getData($data)
    {
        if (self::isAM($data))
            return $data;

        if (self::isBR($data)) {
            list($data, $hora) = explode(" ",$data);
            return  implode("-", array_reverse(explode("/", $data))). " " . $hora   ;
        }

        throw new ApiWebControlException("Parametro data inválido", CodesApi::PARAMETROINVALIDO);
    }
}
