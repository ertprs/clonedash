<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado;

use App\Services\Utils\CodesApi;
use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\Exceptions\ApiWebControlException;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Repository\Contracts\Model\Venda\NotaCreditoRepositoryInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ParceladoDTO;
use App\Services\Vendas\FinalizarPagamentos\FinalizarCartaoCreditoSorocred;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos com 
 * juros e com mora
 * @JMS\AccessType("public_method")
 */
class CartaoCreditoSorocredDTO extends ParceladoDTO
{
    use ValidarFormaPagamento;

    protected $idFormaPagamento = FormasPagamentos::CARTAO_CREDITO_SOROCRED;

    /**
     * @JMS\SerializedName("id_nota")
     * @JMS\Type("integer")
     * 
     * idNota
     * var integer
     */
    private $idNota;

    //sobreescreve o processo de finalizacao
    public function getFinalizarFormaPgto()
    {
        return FinalizarCartaoCreditoSorocred::class;
    }

    /**
     * Get the value of idNota
     */
    public function getIdNota()
    {
        return $this->idNota;
    }

    /**
     * Set the value of idNota
     *
     * @return  self
     */
    public function setIdNota($idNota)
    {
        $this->idNota = $idNota;

        return $this;
    }

    public function validarEspecifico()
    {
        /**
         * @var NotaCreditoRepositoryInterface
         */
        $notaCreditoRepository = app(NotaCreditoRepositoryInterface::class);
        if (!$notaCreditoRepository->getById($this->getIdNota())) {
            throw new ApiWebControlException("Nota de crédito {$this->getIdNota()} inválida", CodesApi::PARAMETROINVALIDO);
        }
    }
}
