<?php

namespace Tests\Unit\Services\Vendas;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\App;
use App\Services\Vendas\FinalizarVendasService;

class FinalizarVendasServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $userLogadoService = App::make(FinalizarVendasService::class);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_fabrica_dto_pgto()
    {
       
    }


}
