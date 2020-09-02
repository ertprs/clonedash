<?php

namespace App\Services\Utils;

/**
 * @author Tiago Franco
 * Servico para centralizacao e
 *  manipulacao dos dados da API Bulkservices
 */
class Bulkservices
{

    public static function getStatus($status)
    {
        switch ($status) {

            case "unverified":
                return 1;
            case "waiting":
                return 2;
            case "sending":
                return 3;
            case "sent":
                return 4;
            case "delivered":
                return 5;
            case "invalid":
                return 6;
            case "inactive_whatsapp":
                return 7;
            case "read":
                return 8;
            case "closed":
                return 9;
        }
    }
}
