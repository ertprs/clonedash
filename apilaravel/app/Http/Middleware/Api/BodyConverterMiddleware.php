<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BodyConverterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        #$currentAction =Route::currentRouteAction();
        #echo '<pre>'.print_r($currentAction).'</pre>';die;
        return $next($request);
    }
}
