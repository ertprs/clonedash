<?php

namespace App\Repository\Eloquent\Model\FormaPagamento;

use App\Model\FormaPagamento\CartaoFidConfig;
use App\Repository\Contracts\Model\FormaPagamento\CartaoFidConfigRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CartaoFidConfigEloquentRepository extends WebControlEloquentRepository implements CartaoFidConfigRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param CartaoFidConfig $model
    */
    public function __construct(CartaoFidConfig $model)
    {
        parent::__construct($model);
    }

    public function cartoesFidelidades()
    {
        return $this->model->whereRaw("id_cadastro = ?", [$this->_usuarioLogadoService->getIdCadastroLogado()])
        ->get();
    }

    public function getPorTipoCartao(string $tipoCartao)
    {
        return $this->model->whereRaw("id_cadastro = ? and tipo_cartao = ?", [
            $this->_usuarioLogadoService->getIdCadastroLogado(),
            $tipoCartao
        ])
        ->first();
    }
}