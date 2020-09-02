<?php

namespace App\Repository\Eloquent\Model\Convenio;

use Illuminate\Support\Facades\DB;
use App\Model\Convenio\ConvenioBancario;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Convenio\ConvenioBancarioRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ConvenioBancarioEloquentRepository extends WebControlEloquentRepository implements ConvenioBancarioRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param ConvenioBancario $model
    */
    public function __construct(ConvenioBancario $model)
    {
        parent::__construct($model);
    }

    public function getConvenioBancario(){
        return DB::connection($this->model->getConnectionName())
        ->table("base_web_control.cadastro_convenio_bancario as cb")
        ->select(
            'cb.id as id_convenio',
            'b.descricao',
            'b.logo',
            'cb.id_banco',
            'cb.carteira',
            'cb.agencia',
            'cb.agencia_dv',
            'cb.conta',
            'cb.conta_dv',
            'cb.seq_boleto',
            'cb.ativo',
            'cb.cod_convenio',
            'cb.chave_crypto',
            'cb.data_atualizacao',
            'habilitado_wc'
        )
        ->join('base_web_control.banco as b', 'b.id', 'cb.id_banco')
        ->where('cb.id_cadastro',$this->_usuarioLogadoService->getIdCadastroLogado())
        ->orderBy('b.descricao','ASC')
        ->first();
    }
}