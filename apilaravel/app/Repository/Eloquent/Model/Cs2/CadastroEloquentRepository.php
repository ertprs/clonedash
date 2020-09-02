<?php

namespace App\Repository\Eloquent\Model\Cs2;

use App\Model\Cs2\Cadastro;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Cs2\CadastroRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CadastroEloquentRepository extends WebControlEloquentRepository implements CadastroRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param Cadastro $model
    */
    public function __construct(Cadastro $model)
    {
        parent::__construct($model);
    }

    public function getCadastroLojista()
    {
        return DB::connection($this->model->getConnectionName())
        ->table("cs2.cadastro")
        ->select('razaosoc','insc','nomefantasia','uf','cidade','bairro','end','numero','complemento','cep','fone','fax',
               'email','celular','id_operadora','fone_res','socio1','cpfsocio1','ramo_atividade','atendente_resp','inscricao_estadual',
               'cnae_fiscal','inscricao_municipal','inscricao_estadual_tributario','cnpj_empresa_faturar','nom_resp_pgto2','nom_resp_pgto3','email_host_server')
        ->where('codloja', '=', $this->_usuarioLogadoService->getIdCadastroLogado())
        ->first();
    }
}