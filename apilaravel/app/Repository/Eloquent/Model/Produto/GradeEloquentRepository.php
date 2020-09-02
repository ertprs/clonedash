<?php

namespace App\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Grade;
use App\Repository\Contracts\Model\Produto\GradeRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class GradeEloquentRepository extends WebControlEloquentRepository implements GradeRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Grade $model
     */
    public function __construct(Grade $model)
    {
        parent::__construct($model);
    }

    public function getGradeProduto(int $idProduto, string $codigoBarra)
    {
        return $this->findOneBy([
            ['id_produto',   '=', $idProduto],
            ['codigo_barra', '=', $codigoBarra],
        ]);
    }
}
