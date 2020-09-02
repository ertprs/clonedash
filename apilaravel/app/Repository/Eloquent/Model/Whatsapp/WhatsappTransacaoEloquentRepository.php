<?php

namespace App\Repository\Eloquent\Model\Whatsapp;

use App\Model\Whatsapp\WhatsappTransacao;
use App\Repository\Contracts\Model\Whatsapp\WhatsappTransacaoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class WhatsappTransacaoEloquentRepository extends WebControlEloquentRepository implements WhatsappTransacaoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param WhatsappTransacao $model
    */
    public function __construct(WhatsappTransacao $model)
    {
        parent::__construct($model);
    }
}