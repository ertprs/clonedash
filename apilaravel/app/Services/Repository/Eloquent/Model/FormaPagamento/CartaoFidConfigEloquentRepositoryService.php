<?php

namespace App\Services\Repository\Eloquent\Model\FormaPagamento;

use App\Model\FormaPagamento\CartaoFidConfig;
use App\Repository\Eloquent\Model\FormaPagamento\CartaoFidConfigEloquentRepository;
use App\Services\Repository\Contracts\Model\FormaPagamento\CartaoFidConfigRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CartaoFidConfigEloquentRepositoryService extends WebControlEloquentRepositoryService implements CartaoFidConfigRepositoryServiceInterface
{
    public function __construct(CartaoFidConfig $model, CartaoFidConfigEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
