<?php

namespace App\Services\Repository\Eloquent\Model\Controle;

use Illuminate\Support\Facades\DB;
use App\Model\Controle\CadastroControles;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\Controle\CadastroControlesEloquentRepository;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CadastroControlesEloquentRepositoryService extends WebControlEloquentRepositoryService implements CadastroControlesRepositoryServiceInterface
{
    public function __construct(CadastroControles $model, CadastroControlesEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function vincularControleFormaPagamento(int $idFormaPagamento)
    {
        return $this->model->create([
            "id_cadastro"        => $this->_usuarioLogadoService->getIdCadastroLogado(),
            "id_forma_pagamento" => $idFormaPagamento,
            "numero"             => 1 
        ]);
    }

    public function incrementarControleFormaPagamento(int $idFormaPagamento) {
        DB::connection($this->model->getConnectionName())->update(
            "UPDATE base_web_control.cadastro_controles SET numero = numero + 1 WHERE id_cadastro = ? AND id_forma_pagamento = ?",
            [$this->_usuarioLogadoService->getIdCadastroLogado(), $idFormaPagamento]);
    }
}
