<?php

namespace Tests\Unit\Services\Repository\Eloquent\Model\Cliente;

use App\User;
use Tests\TestCase;
use App\Model\Cliente\Cliente;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\App;
use App\Services\Auth\UsuarioLogadoService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use App\Repository\Eloquent\Model\Cliente\ClienteEloquentRepository;
use App\Services\Repository\Eloquent\Model\Cliente\ClienteEloquentRepositoryService;

class ClienteEloquentRepositoryServiceTest extends TestCase
{
    use InteractsWithDatabase; 
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        
        $cliente           = new Cliente();
        $userLogadoService = App::make(UsuarioLogadoService::class);
        $repository        = App::make(ClienteEloquentRepository::class, array($userLogadoService));
        $service           = App::make(ClienteEloquentRepositoryService::class, array($cliente, $repository));
    
        $this->repository = $service;

        // Create a single App\Model\Cliente instance...
        $this->cliente = factory(Cliente::class)->create();
        // Create a single App\User instance...
        $this->user = factory(User::class)->create();          

        for ($i=0; $i <= 10 ; $i++) { 
            $this->createClientes();
        }
    }

    private function createClientes() {
        $token = JWTAuth::fromUser($this->user);
        
        $novoCliente = [
            "tipo_pessoa" => "F",
            "cnpj_cpf" => str_pad(rand(0, 99999999), 11),
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

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', 'api/v1/clientes/cadastrar', $novoCliente);        
    }
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_cliente_by_field()
    {
        // Make call to application...

        $this->assertDatabaseHas('base_web_control.cliente', [
            'id' => '1',
        ]);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_by_repository_by_one_field()
    {
        // Testa se retorno o objeto em array
        $cliente = $this->repository->findBy([
            ['id_cadastro', '=', '23434'],
        ]);
        $this->assertCount(1, $cliente);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_by_repository_with_limit()
    {
        // Testa se retorno o objeto em array
        $cliente = $this->repository->findBy([],[], 10);
        $this->assertCount(10, $cliente);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_by_repository_with_order_by()
    {
        // Testa se retorno o objeto em array
        $cliente = $this->repository->findBy([],[['id', 'asc'],['nome', 'desc']], 10);
        $this->assertCount(10, $cliente);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_by_repository_by_two_more_field()
    {
        // Testa se retorno o objeto em array
        $cliente = $this->repository->findBy([
            ['id_cadastro', '=', '23434'], 
            ['cnpj_cpf', '=', '00582918901'] #from ClienteFactory
        ]);
        $this->assertCount(1, $cliente);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_one_by_repository()
    {
        // Testa se retorno o objeto em model
        $cliente = $this->repository->findOneBy([['cnpj_cpf', '=', '00582918901']]);
        $this->assertNotNull($cliente);
    }

     /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_by_field_repository()
    {
        // Testa se retorno o objeto em array
        $cliente = $this->repository->findByCnpjCpf('00582918901');
        $this->assertCount(1, $cliente);

        $cliente = $this->repository->findBycnpj_cpf('00582918901');
        $this->assertCount(1, $cliente);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_find_one_by_field_repository()
    {
        // Testa se retorno o objeto em model
        $cliente = $this->repository->findOneByCnpjCpf('00582918901');
        $this->assertNotNull(1, $cliente);

        $cliente = $this->repository->findOneBycnpj_cpf('00582918901');
        $this->assertNotNull(1, $cliente);
    }

}
