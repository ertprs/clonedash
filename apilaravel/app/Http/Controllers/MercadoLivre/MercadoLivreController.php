<?php

namespace App\Http\Controllers\MercadoLivre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DTO\SincronizarMercadoLivreDTO;
use App\Jobs\RabbitMQJob;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\MercadoLivre\ManterMercadoLivreService;

class MercadoLivreController extends Controller
{
    public function sincronizar(RequestBodyConverter $requestBodyConverter, ManterMercadoLivreService $manterMercadoLivreService)
    {
        $synMeLiDTO = $requestBodyConverter->deserializer(new SincronizarMercadoLivreDTO());

        return $this->send(["produto" => $manterMercadoLivreService->syncronizeMeLivre($synMeLiDTO)]);
    }
    
    public function getProdutosASincrolizar(ProdutoRepositoryInterface $produtoRepository){

        return $this->send($produtoRepository->getProdutosSincronizar());
    }

    public function receberNotificacoesMeLivre(Request $request) {
        $notificacao = json_decode($request->getContent());
    
        RabbitMQJob::dispatch(['job' => 'App\Jobs\NotificacoesMercadoLivreJob', 'data' => $notificacao, 'queue' => 'notificacoes_meli', 'connection' => 'rabbitmq'])->onConnection("rabbitmq")->onQueue('geral');

        return "Ok";
    } 
}