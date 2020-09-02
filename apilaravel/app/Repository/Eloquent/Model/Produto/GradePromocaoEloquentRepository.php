<?php

namespace App\Repository\Eloquent\Model\Produto;

use App\Model\Produto\GradePromocao;
use App\Repository\Contracts\Model\Produto\GradePromocaoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class GradePromocaoEloquentRepository extends WebControlEloquentRepository implements GradePromocaoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param GradePromocao $model
     */
    public function __construct(GradePromocao $model)
    {
        parent::__construct($model);
    }

    public function getGradePromocao(int $idGrade, int $ativo = 1)
    {
        return $this->model
        ->whereRaw("id_grade = ? AND disponivel_inicio <= NOW() AND disponivel_final >= NOW() AND ativo = ?", [
            $idGrade, $ativo
        ])
        ->first();
    }
}
