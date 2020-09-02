<?php

namespace App\Services\FrenteCaixa;

use Illuminate\Http\Request;
use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\DTO\FrenteCaixa\FCVendaDTO;
use App\Exceptions\AlertaException;
use Illuminate\Support\Facades\Crypt;
use App\DTO\FrenteCaixa\FCItemVendaDTO;
use App\Exceptions\ApiWebControlException;
use App\DTO\FrenteCaixa\CalculoTotalDescontosDTO;
use App\Services\Extensions\RequestBodyConverter;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Repository\Contracts\Model\Kits\PromocaoKitRepositoryInterface;
use App\Repository\Contracts\Model\Produto\GradePromocaoRepositoryInterface;
use App\Repository\Contracts\Model\Produto\PromocaoQuantidadeRepositoryInterface;
use App\Services\Repository\Contracts\Model\FrenteCaixa\FcVendaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para operações basica sobre as operações da frente
 */
class FrenteCaixaServices
{
    /**
     * @var Request
     */
    private $_request;

    /**
     * @var RequestBodyConverter
     */
    private $_requestBodyConverter;

    /**
     * @var PromocaoKitRepositoryInterface
     */
    private $_promocaoKitRepository;

    /**
     * @var PromocaoQuantidadeRepositoryInterface
     */
    private $_promocaoQuantidadeRepository;

    /**
     * @var FcVendaRepositoryServiceInterface
     */
    private $_fcVendaRepositoryService;

    /**
     * @var GradePromocaoRepositoryInterface
     */
    private $_gradePromocaoRepository;

    public function __construct(
        Request $request,
        RequestBodyConverter $requestBodyConverter,
        PromocaoKitRepositoryInterface $promocaoKitRepository,
        PromocaoQuantidadeRepositoryInterface $promocaoQuantidadeRepository,
        FcVendaRepositoryServiceInterface $fcVendaRepositoryService,
        GradePromocaoRepositoryInterface $gradePromocaoRepository
    ) {
        $this->_request                      = $request;
        $this->_requestBodyConverter         = $requestBodyConverter;
        $this->_promocaoKitRepository        = $promocaoKitRepository;
        $this->_promocaoQuantidadeRepository = $promocaoQuantidadeRepository;
        $this->_fcVendaRepositoryService     = $fcVendaRepositoryService;
        $this->_gradePromocaoRepository      = $gradePromocaoRepository;
    }

    public function getInicialCaixa()
    {
        if (!$token = $this->_request->header('fc_token')) {
            #NOTIFICACAO DE TENTATIVA DE OPERACAO INVALIDA SOBRE OS SERVICOS DA FRENTE DE CAIXA
            report(new AlertaException(
                "Acesso inválido frente de caixa. Nao enviado o fc_token. Request: "
                    . $this->_requestBodyConverter->serializer($this->_request),
                "alert"
            ));
            throw new ApiWebControlException("Acesso inválido", CodesApi::OPERACAOINVALIDA);
        }

        try {

            $token = Crypt::decrypt($token);
            $token =  explode("_", $token);

            return [
                "valor-inicial" => $token[0],
                "num-caixa"     => $token[1],
                "id"            => $token[2]
            ];
        } catch (DecryptException $th) {
            #NOTIFICACAO DE TENTATIVA DE OPERACAO INVALIDA SOBRE OS SERVICOS DA FRENTE DE CAIXA
            report(new AlertaException(
                "Acesso inválido frente de caixa. fc_token inválido. Request: "
                    . $this->_requestBodyConverter->serializer($this->_request),
                "alert"
            ));
            throw new ApiWebControlException("Acesso inválido", CodesApi::OPERACAOINVALIDA);
        }
    }

    public function pesquisaKitsCodigoBarras(string $codigoBarra) {
        $retorno = $this->_promocaoKitRepository->getKitsCodigoBarras($codigoBarra);

        $kits     = [];
        $kitAtual = 0;
        
        foreach ($retorno as $item) {
            $idKit =  $item->id_kit;

            if($idKit != $kitAtual) {
                $kits[$idKit] = ["id" => $idKit, "descricao" => $item->descricao_kit, "grades" => array()];
            }    

            $kits[$idKit]["grades"][] = $item;
            unset($item->id_kit);
            unset($item->descricao_kit);

            $kitAtual = $idKit;
        }

        return $kits;
    }

    public function getTotalDescontos(CalculoTotalDescontosDTO $dto) {
         $total = 0;
        foreach ($dto->getItens() as $item) {            
            $total += $this->_promocaoQuantidadeRepository->getTotalDescontos($item['qtde_itens'], $item['id_grade']);
        }

        return $total;
    }

    //Servico para salvar uma nova venda pela frente de caixa
    public function salvarVenda(FCVendaDTO $fCVendaDTO) {
        $informacoesCaixa = $this->getInicialCaixa();
        $venda            = $this->_fcVendaRepositoryService->novaVendaFrenteCaixa($fCVendaDTO, $informacoesCaixa);
        return $venda;
    }

    //Servico para lancar um item de venda pela frente de caixa
    public function salvarItemVenda(FCItemVendaDTO $fCItemVendaDTO) {
        $itensKit = $this->_promocaoKitRepository->getKitsCodigoBarras($fCItemVendaDTO->getCodigoBarra());

        #item de venda selecionado foi de um kit
        if(!empty($itensKit)) {
            return $this->_fcVendaRepositoryService->salvarItensKitProduto($fCItemVendaDTO->getIdVenda(), $itensKit);
        }

        #se produto em promocao aplica os descontos da promocao e vincula o id da promocao
        if($gradePromocao = $this->_gradePromocaoRepository->getGradePromocao($fCItemVendaDTO->getIdGrade())) 
        {
            $fCItemVendaDTO->setValorUnitario($gradePromocao->promo_valor_varejo_aprazo);
            $fCItemVendaDTO->setIdPromocao($gradePromocao->id_grade_promocao);
        }

        $fCItemVendaDTO->setPrecoVenda($fCItemVendaDTO->getValorUnitario() * $fCItemVendaDTO->getQtd());

        $itemVenda = $this->_fcVendaRepositoryService->novoItemVendaFrenteCaixa($fCItemVendaDTO);
        return $itemVenda;
    }

    /*public function salvarVenda2(FCVendaDTO $fCVendaDTO)
    {
        $informacoesCaixa = $this->getInicialCaixa();

        try {
            DB::beginTransaction();
            $venda = $this->_fcVendaRepositoryService->novaVendaFrenteCaixa($fCVendaDTO, $informacoesCaixa);
            
            foreach($fCVendaDTO->getItensVenda() as $itemVendaDto) {
                $this->_fcVendaRepositoryService->novoItemVendaFrenteCaixa($venda, $itemVendaDto);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }*/
}
