<?php

namespace App\Repository\Eloquent\Model\Cs2;

use Illuminate\Support\Facades\DB;
use App\Model\Cs2\TitulosRecebaFacil;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Cs2\TitulosRecebaFacilRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class TitulosRecebaFacilEloquentRepository extends WebControlEloquentRepository implements TitulosRecebaFacilRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param TitulosRecebaFacil $model
     */
    public function __construct(TitulosRecebaFacil $model)
    {
        parent::__construct($model);
    }

    public function getTotalTitulosRecebaFacil(array $informacoesCaixa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table('cs2.titulos_recebafacil')
            ->whereRaw("codLoja = ? and id_abertura_caixa = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), $informacoesCaixa["id"]])
            ->sum('valorpg');
    }
}
