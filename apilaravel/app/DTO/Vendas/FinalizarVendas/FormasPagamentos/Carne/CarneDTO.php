<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne;

use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarCarnes;

/** 
 * Objeto responsavel pelo processamento
 * da forma de pagamento do cheque
 * @JMS\AccessType("public_method")
 */
class CarneDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;
    
    private $idFormaPagamento = FormasPagamentos::CARNE;
    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne\ItemCarneDTO>")
     * 
     * parcelas
     * var array
     */
    private $parcelas;

    /**
     * @JMS\SerializedName("numero_contrato")
     * @JMS\Type("integer")
     * 
     * numeroContrato
     * var integer
     */
    private $numeroContrato;

    /**
     * @JMS\SerializedName("numero_documento")
     * @JMS\Type("integer")
     * 
     * numeroDocumento
     * var integer
     */
    private $numeroDocumento;

    /**
     * @JMS\SerializedName("id_tipo_documento")
     * @JMS\Type("integer")
     * 
     * idTipoDocumento
     * var integer
     */
    private $idTipoDocumento;

    /**
     * @JMS\SerializedName("id_fornecedor")
     * @JMS\Type("integer")
     * 
     * idFornecedor
     * var integer
     */
    private $idFornecedor;

    /**
     * @JMS\SerializedName("cod_aut_cartao")
     * @JMS\Type("string")
     * 
     * codAutCartao
     * var string
     */
    private $codAutCartao;

    /**
     * @JMS\SerializedName("id_credenciadora")
     * @JMS\Type("string")
     * 
     * idCredenciadora
     * var string
     */
    private $idCredenciadora;

    /**
     * @JMS\SerializedName("cnpj_credenciadora")
     * @JMS\Type("string")
     * 
     * cnpjCredenciadora
     * var string
     */
    private $cnpjCredenciadora;

    /**
     * Get the value of idFormaPagamento
     */
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }
    
    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemCarneDTO $parcelas) {
            return $parcelas->getValor();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarCarnes::class;
    }

    /**
     * Get the value of parcelas
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * Set the value of parcelas
     *
     * @return  self
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;

        return $this;
    }

    /**
     * Get the value of numeroContrato
     */
    public function getNumeroContrato()
    {
        return $this->numeroContrato;
    }

    /**
     * Set the value of numeroContrato
     *
     * @return  self
     */
    public function setNumeroContrato($numeroContrato)
    {
        $this->numeroContrato = $numeroContrato;

        return $this;
    }

    /**
     * Get the value of numeroDocumento
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set the value of numeroDocumento
     *
     * @return  self
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    /**
     * Get the value of idTipoDocumento
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }

    /**
     * Set the value of idTipoDocumento
     *
     * @return  self
     */
    public function setIdTipoDocumento($idTipoDocumento)
    {
        $this->idTipoDocumento = $idTipoDocumento;

        return $this;
    }

    /**
     * Get the value of idFornecedor
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Set the value of idFornecedor
     *
     * @return  self
     */
    public function setIdFornecedor($idFornecedor)
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    /**
     * Get the value of codAutCartao
     */
    public function getCodAutCartao()
    {
        return $this->codAutCartao;
    }

    /**
     * Set the value of codAutCartao
     *
     * @return  self
     */
    public function setCodAutCartao($codAutCartao)
    {
        $this->codAutCartao = $codAutCartao;

        return $this;
    }

    /**
     * Get the value of idCredenciadora
     */
    public function getIdCredenciadora()
    {
        return $this->idCredenciadora;
    }

    /**
     * Set the value of idCredenciadora
     *
     * @return  self
     */
    public function setIdCredenciadora($idCredenciadora)
    {
        $this->idCredenciadora = $idCredenciadora;

        return $this;
    }

    /**
     * Get the value of cnpjCredenciadora
     */
    public function getCnpjCredenciadora()
    {
        return $this->cnpjCredenciadora;
    }

    /**
     * Set the value of cnpjCredenciadora
     *
     * @return  self
     */
    public function setCnpjCredenciadora($cnpjCredenciadora)
    {
        if (!empty($cnpjCredenciadora))
            $this->cnpjCredenciadora = str_pad(preg_replace("/\D+/", "", $cnpjCredenciadora), 14, 0, STR_PAD_LEFT);

        return $this;
    }

    /**
     * Set the value of idFormaPagamento
     *
     * @return  self
     */ 
    public function setIdFormaPagamento($idFormaPagamento)
    {
        $this->idFormaPagamento = $idFormaPagamento;

        return $this;
    }
}
