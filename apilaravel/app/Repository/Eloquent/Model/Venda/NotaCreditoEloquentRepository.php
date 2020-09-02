<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\NotaCredito;
use App\Repository\Contracts\Model\Venda\NotaCreditoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class NotaCreditoEloquentRepository extends WebControlEloquentRepository implements NotaCreditoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param NotaCredito $model
     */
    public function __construct(NotaCredito $model)
    {
        parent::__construct($model);
    }

    public function getById(int $idNotaCredito)
    {
        return $this->findOneBy([
            ["id", "=", $idNotaCredito],
            ["id_cadastro", "=", $this->_usuarioLogadoService->getIdCadastroLogado()],
        ]);
    }
}
