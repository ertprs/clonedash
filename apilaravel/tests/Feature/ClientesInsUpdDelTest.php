<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Model\Cliente\Cliente;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientesInsUpdDelTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // Create a single App\User instance...
        $this->user = factory(User::class)->create();          
    }
    /**
     * A basic feature test example.
     * 
     * @return void
     */
    public function create_cliente()
    {
        // Create a single App\User instance...
        $cliente = factory(Cliente::class)->create();

        $this->assertNotNull($cliente->id);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function create_cliente_from_cliente_service()
    {
        
        $token = JWTAuth::fromUser($this->user);
        
        $novoCliente = [
            "tipo_pessoa" => "F",
            "cnpj_cpf" => "05674315922",
            "nome" => $this->faker->name,
            "razao_social" => $this->faker->company,
            "id_tipo_log" => "1",
            "endereco" => $this->faker->address,
            "numero" => $this->faker->randomNumber(),
            "complemento" => $this->faker->secondaryAddress,
            "bairro" => $this->faker->name,
            "cidade" => $this->faker->city,
            "uf" => "PR",
            "cep" => $this->faker->postcode,
            "pais" => "BRASIL",
            "email" => $this->faker->unique()->safeEmail,
            "telefone" => $this->faker->phoneNumber,
            "celular" => $this->faker->phoneNumber,
            "empresa_trabalha" => "",
            "socio2" => $this->faker->name,
            "fax" => "",
            "endereco_empresa" => $this->faker->address
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', 'api/v1/clientes/cadastrar', $novoCliente);
 
        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => 201,
                'conteudo' => [
                    'id_cadastro' => $this->user->id_cadastro,
                    'id_usuario'  => $this->user->id,
                ]
            ]);
        
        $this->assertDatabaseHas('base_web_control.cliente', [
            'email'       => $novoCliente["email"],
            'id_cadastro' => $this->user->id_cadastro,
            'id_usuario'  => $this->user->id
        ]);
    }
}
