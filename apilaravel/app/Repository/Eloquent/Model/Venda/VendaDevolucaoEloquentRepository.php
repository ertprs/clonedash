<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\Model\Venda\VendaDevolucao;
use App\Entity\Model\Venda\VendaInterface;
use App\Exceptions\ApiWebControlException;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Venda\VendaDevolucaoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class VendaDevolucaoEloquentRepository extends WebControlEloquentRepository implements VendaDevolucaoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param VendaDevolucao $model
     */
    public function __construct(VendaDevolucao $model)
    {
        parent::__construct($model);
    }

    public function getDevolucaoVenda(VendaInterface $venda)
    {
        return VendaDevolucao::from("base_web_control.venda_devolucao as d")
            ->where(
                ["d.id_venda"    => $venda->id],
                ["d.id_cadastro" => $this->_usuarioLogadoService->getIdCadastroLogado()]
            )
            ->leftJoin('base_web_control.venda_itens_devolucao as idev', function ($join) {
                $join->on('idev.id_venda_devol', 'd.id');
                $join->on('idev.finalizados', DB::raw("'N'"));
            })
            ->get();
    }

    public function finalizarDevolucao(VendaInterface $venda)
    {
        $sucess = DB::table('base_web_control.venda_devolucao')
            ->whereRaw('id_venda = ? and id_cadastro = ?', [$venda->id, $this->_usuarioLogadoService->getIdCadastroLogado()])
            ->update(['finalizada' => "S"]);

        if (!$sucess) {
            throw new ApiWebControlException("Erro ao finalizar a devolução", CodesApi::ERROOPERACAO);
        }
    }

    public function finalizarItemDevolucao(VendaInterface $venda)
    {

       return DB::table('base_web_control.venda_itens_devolucao')
            ->whereRaw('id_venda = ?', [$venda->id])
            ->update(['finalizados' => "S"]);

    }
}
