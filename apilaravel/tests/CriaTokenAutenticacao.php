<?php

namespace Tests;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Contracts\Console\Kernel;

trait CriaTokenAutenticacao
{
    /**
     * Recupera o token da autenticacao
     * para testes de rotas protejidas
     *
     * @return \Illuminate\Foundation\Application
     */
    public function getTokenAutenticacao()
    {
        // Create a single App\User instance...
        $user = factory(User::class)->create();  

        #$user    = User::whereRaw('login = ? and api_key = AES_ENCRYPT(?,?)', array(env("API_USER_LOGIN_TEST"), env("API_USER_LOGIN_SENHA"), env('DB_ENCRYPY_KEY')))->first();
        return JWTAuth::fromUser($user);
    }

    
}
