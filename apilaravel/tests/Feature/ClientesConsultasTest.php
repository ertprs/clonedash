<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientesConsultasTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_get_clientes_cadastro_com_autenticacao()
    {
        $token   = $this->getTokenAutenticacao();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('api/v1/clientes');

        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => 200
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_get_clientes_cadastro_sem_autenticacao()
    {
        #teste sem o token
        $response = $this->get('api/v1/clientes');
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 'Token Authorization nao encontrado'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_get_clientes_pelo_nome_cadastro_com_autenticacao()
    {
        $token   = $this->getTokenAutenticacao();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('api/v1/clientes/teste');

        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => 200
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_get_clientes_pelo_nome_cadastro_sem_autenticacao()
    {
        #teste sem o token
        $response = $this->get('api/v1/clientes/teste');
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 'Token Authorization nao encontrado'
            ]);
    }
}
