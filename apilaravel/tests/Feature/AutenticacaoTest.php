<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutenticacaoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_login_sucess()
    {
        // Create a single App\User instance...
        $user = factory(User::class)->create(); 

        $response = $this->post('api/v1/login', [
            'login' => $user->login,
            'senha' => $user->senha
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_login_error()
    {
        $response = $this->post('api/v1/login', [
            'login' => 2133,
            'senha' => 344
        ]);

        $response
            ->assertStatus(401)
            ->assertExactJson([
                'error' => 'Login invalido'
            ]);
    }

    /**
     * Test logout.
     * @test
     * @return void
     */
    public function verify_logout_sucess()
    {
        $token   = $this->getTokenAutenticacao();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('api/v1/logout');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'message' => 'Logged out realizado com sucesso'
            ]);
    }
}
