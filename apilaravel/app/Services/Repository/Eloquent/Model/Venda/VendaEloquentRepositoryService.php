<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\Venda;
use Illuminate\Support\Facades\DB;
use App\DTO\VincularVendaProducaoDTO;
use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\Repository\Eloquent\Model\Venda\VendaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class VendaEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaRepositoryServiceInterface
{
    public function __construct(Venda $model, VendaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function vincularClienteFuncionario(VincularVendaProducaoDTO $vincProducaoDTO)
    {
        return $this->model::where('id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado())
            ->where('id', $vincProducaoDTO->getId())
            ->update([
                'id_cliente'     => $vincProducaoDTO->getIdCliente(),
                'id_funcionario' => $vincProducaoDTO->getIdFuncionario()
            ]);
    }

    public function fecharVenda(FinalizarVendaDTO $finalizarVendaDTO)
    {
        $venda = $this->model->where([
            ['id_cadastro', '=', $this->_usuarioLogadoService->getIdCadastroLogado()],
            ['id', '=', $finalizarVendaDTO->getIdVenda()]
        ])->first();


        $venda->data_venda             = DB::raw("now()");
        $venda->hora_venda             = DB::raw("curtime()");
        $venda->situacao               = Venda::SIT_ENCERRADA;
        $venda->observacao             = $finalizarVendaDTO->getObservacao();
        $venda->id_abertura_caixa      = $finalizarVendaDTO->getIdAberturaCaixa();
        $venda->id_usuario_fecha_venda = $finalizarVendaDTO->getIdUsuarioFechaVenda();

        if ($venda->id_tipo_venda != 3) {
            $venda->id_funcionario = $finalizarVendaDTO->getIdUsuarioFechaVenda();
        }

        $venda->save();
        return $venda;
    }

    public function addEntradaVenda(int $idVenda, float $parcelaPagamento)
    {
        $sql = "UPDATE base_web_control.venda SET valor_entrada = valor_entrada + ? where id = ?";
        DB::update($sql, [$parcelaPagamento, $parcelaPagamento, $idVenda]);
    }
}
