<?php

namespace App\Services\Repository\Eloquent\Model\FrenteCaixa;

use App\User;
use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\DTO\FrenteCaixa\SangriaDTO;
use App\Model\FrenteCaixa\ValorSangria;
use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Exceptions\ApiWebControlException;
use App\Model\FrenteCaixa\ValorExtraCaixa;
use App\Model\FrenteCaixa\ValorInicialCaixa;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\FrenteCaixa\ValorInicialCaixaEloquentRepository;
use App\Services\Repository\Contracts\Model\FrenteCaixa\ValorInicialCaixaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ValorInicialCaixaEloquentRepositoryService extends WebControlEloquentRepositoryService implements ValorInicialCaixaRepositoryServiceInterface
{
    public function __construct(ValorInicialCaixa $model, ValorInicialCaixaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function criarSangria(SangriaDTO $sangriaDTO, User $sacador, array $informacoesCaixa)
    {
        $sangria = new ValorSangria();
        $sangria->id_cadastro            = $this->_usuarioLogadoService->getIdCadastroLogado();
        $sangria->id_usuario_retiro      = $sacador->id;
        $sangria->valor                  = $sangriaDTO->getValor();
        $sangria->id_valor_inicial_caixa = $informacoesCaixa["id"];
        $sangria->id_user_logado         = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $sangria->obs                    = $informacoesCaixa["num-caixa"];

        $sangria->save();

        if (!$sangria->id) {
            throw new ApiWebControlException("Erro ao incluir o lançamento da sangria", CodesApi::ERROOPERACAO);
        }

        return $sangria;
    }

    public function addValorExtraCaixa(array $informacoesCaixa, MovimentacoesDTO $movimentacoesDTO)
    {
        $sql = "update
                    base_web_control.valor_inicial_caixa
                set
                    vr_extra_caixa = vr_extra_caixa + :valor
                where
                    id = :id
                and
                    id_cadastro = :id_cadastro";

        if (!DB::update($sql, [
            ":id"          => $informacoesCaixa['id'],
            ":id_cadastro" => $this->_usuarioLogadoService->getIdCadastroLogado(),
            ":valor"       => $movimentacoesDTO->getValorMovimentacao()
        ])) {
            throw new ApiWebControlException("Erro ao adicionar o crédito no caixa", CodesApi::ERROOPERACAO);
        }
    }


    public function salvarEntradaExtraCaixa($informacoesCaixa, MovimentacoesDTO $movimentacoesDTO)
    {
        $extra = new ValorExtraCaixa();
        $extra->id_cadastro       = $this->_usuarioLogadoService->getIdCadastroLogado();
        $extra->id_abertura_caixa = $informacoesCaixa['id'];
        $extra->id_cliente        = $movimentacoesDTO->getIdCliente();
        $extra->numero_caixa      = $informacoesCaixa["num-caixa"];
        $extra->valor             = $movimentacoesDTO->getValorMovimentacao();
        $extra->motivo            = $movimentacoesDTO->getDescricao();
        $extra->data_entrada      = date("Y-m-d H:i:s");
        $extra->data_alteracao    = $extra->data_entrada;

        $extra->save();

        if (!$extra->id) {
            throw new ApiWebControlException("Erro ao salvar o registro do crédito", CodesApi::ERROOPERACAO);
        }

        return $extra;
    }
}
