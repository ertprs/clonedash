<?php

namespace App\Services\Repository\Eloquent\Model\Whatsapp;

use App\Model\Whatsapp\WhatsappLista;
use App\Repository\Eloquent\Model\Whatsapp\WhatsappListaEloquentRepository;
use App\Services\Repository\Contracts\Model\Whatsapp\WhatsappListaRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class WhatsappListaEloquentRepositoryService extends WebControlEloquentRepositoryService implements WhatsappListaRepositoryServiceInterface
{
    public function __construct(WhatsappLista $model, WhatsappListaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
