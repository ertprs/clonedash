<?php

namespace App\Http\Controllers;

use App\ResponseApi\ResponseApi;
use App\ResponseApi\ResponseApiDev;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function send($conteudo, $code = Response::HTTP_OK, $msg = "") {
        if(env('APP_ENV') == "production") {
            return new ResponseApi($conteudo, $msg, $code);
        } else {
            return new ResponseApiDev(null, $conteudo, $msg, $code);
        }
    }
}
