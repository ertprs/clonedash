<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelatoriosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_relatorio_clientes_com_autenticacao()
    {
        $token   = $this->getTokenAutenticacao();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', 'api/v1/relatorios/clientes', [
            "id_cadastro"  => "",
            "data_inicial" => "",
            "data_final"   => "2020-07-14 20:51:00",
            "tipo_pessoa"  => "",
            "ipt_uf"       => "",
            "cidade"       => "",
            "situacao"     => "",
            "bairro"       => "",
            "campos"       => [
                "id_curso",
                "id_funcioanario"
            ]
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'code', 
                'conteudo' => [
                    "clientes",
                    "filtros"
                ]
            ]);
    }
}
