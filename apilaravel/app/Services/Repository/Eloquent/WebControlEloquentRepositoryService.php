<?php

namespace App\Services\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Eloquent\AbstractEloquentRepository;

abstract class WebControlEloquentRepositoryService extends AbstractEloquentRepositoryService
{
    //Seta a conexao a ser utilizada
    //Todos os models que forem utilizar essa conexao deverao extender dessa classe
    //Serve com uma configuracao de cluster mysql
    protected $connection = "webcontrol";

    public function __construct(Model $model, AbstractEloquentRepository $repository)
    {
        if(env("APP_ENV") == "testing") {
            $this->connection = "testing";
        }
        //setando a conexao do model de escrita
        $model->setConnection($this->connection);        
        
        $this->model      = $model;
        $this->repository = $repository;
        
        parent::__construct();
    }
}
