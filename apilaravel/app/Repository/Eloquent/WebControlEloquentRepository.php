<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Eloquent\AbstractEloquentRepository;

abstract class WebControlEloquentRepository extends AbstractEloquentRepository
{
    //Seta a conexao a ser utilizada
    //Todos os models que forem utilizar essa conexao deverao extender dessa classe
    //Serve com uma configuracao de cluster mysql
    protected $connection = "webcontrol";

    public function __construct(Model $model)
    {
        if(env("APP_ENV") == "testing") {
            $this->connection = "testing";
        }
        //setando a conexao do model de consultas
        $model->setConnection($this->connection);
        $this->model = $model;

        parent::__construct();
    }
}
