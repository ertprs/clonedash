<?php

namespace App\Services\Repository\Eloquent\Model\Whatsapp;

use App\Model\Whatsapp\WhatsappCampanha;
use App\Repository\Eloquent\Model\Whatsapp\WhatsappCampanhaEloquentRepository;
use App\Services\Repository\Contracts\Model\Whatsapp\WhatsappCampanhaRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class WhatsappCampanhaEloquentRepositoryService extends WebControlEloquentRepositoryService implements WhatsappCampanhaRepositoryServiceInterface
{
    public function __construct(WhatsappCampanha $model, WhatsappCampanhaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
