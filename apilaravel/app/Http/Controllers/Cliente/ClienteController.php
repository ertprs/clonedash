<?php

namespace App\Http\Controllers\Cliente;

use App\DTO\ClienteDTO;
use App\Http\Controllers\Controller;
use App\Services\Clientes\ClientesService;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\Repository\Contracts\Model\Cliente\ClienteRepositoryServiceInterface;

class ClienteController extends Controller
{
    /**
     * Retorno os clientes do cadastro
     */
    public function index(ClienteRepositoryServiceInterface $clienteRepositoryService)
    {
        return $this->send($clienteRepositoryService->getClientes());
    }

    /**
     * Função para pesquisa de clientes
     * do cadastro pelo nome 
     */
    public function pesquisar(ClienteRepositoryServiceInterface $clienteRepositoryService, string $cliente)
    {
        return $this->send($clienteRepositoryService->pesquisarClientesPeloNome($cliente));
    }

    /**
     * Função que recebe um cadastro de um novo cliente
     */
    public function cadastrar(RequestBodyConverter $requestBodyConverter, ClienteRepositoryServiceInterface $clienteRepositoryService)
    {
        $clienteDTO = $requestBodyConverter->deserializer(new ClienteDTO());
        $cliente    = $clienteRepositoryService->salvarClientes($clienteDTO);

        return $this->send($cliente, Response::HTTP_CREATED);
    }

    public function testarFila(){        
        
        /*$json = '{
            "resource": "/orders/MLB866539393",
            "user_id": 1234,
            "topic": "orders_v2",
            "received": "2011-10-19T16:38:34.425Z",
            "sent" : "2011-10-19T16:40:34.425Z"
        }';

        RabbitMQJob::dispatch([
            "queue"      => "notificacoes_meli",
            "connection" => "rabbitmq",
            "job"        => "App\Jobs\NotificacoesMercadoLivreJob",
            "data"       => json_decode($json, true),
        ])->onConnection("rabbitmq")->onQueue("geral");*/
    }
}
