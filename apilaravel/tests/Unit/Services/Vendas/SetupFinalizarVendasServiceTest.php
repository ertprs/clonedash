<?php

namespace Tests\Unit\Services\Vendas;

use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto\BoletoDTO;
use Tests\TestCase;
use Illuminate\Support\Facades\App;
use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne\CarneDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque\ChequeDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente\ContaCorrenteClienteDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Debito\DebitoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\JurosMoraDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\NotaPromissoriaDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito\NotaCreditoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\CartaoCreditoAuraDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ParceladoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\CartaoCreditoSorocredDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValeComprasFuncionario\ValeComprasFuncionarioDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValePresente\ValePresenteDTO;
use App\Services\Extensions\RequestBodyConverter;

class SetupFinalizarVendasServiceTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->_setup = App::make(SetupFinalizarVendasService::class);
        $this->_requetBodyConverter = App::make(RequestBodyConverter::class);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_build_formas_pagamentos()
    {
        $finalizaVendaDTO = $this->getFinalizaVendaDTO();
        $formasPagamentos = $this->_setup->buildFormasPagamentos($finalizaVendaDTO->getPagamentos());
        $this->assertCount(count($finalizaVendaDTO->getPagamentos()), $formasPagamentos);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_set_up_inf_vendas()
    {
        $finalizaVendaDTO = $this->getFinalizaVendaDTO();
        $this->_setup->setUp($finalizaVendaDTO);
        
         echo '<pre>'.print_r($this->setUp->getAtributosVenda()).'</pre>';die;
    }

    private function getFinalizaVendaDTO()
    {
        $formaPagamentoDTO = [
            "id_venda" => "1",
            "id_cliente" => "1",
            "id_usuario_fecha_venda" => "1",
            "id_abertura_caixa" => "1",
            "frete" => "12",
            "pagamentos" => [
                [
                    "id_forma_pagamento" => FormasPagamentos::CHEQUE,
                    "cheques" => [
                        [
                            "valor" => 13,
                            "cmc7" => 89033333
                        ],
                        [
                            "valor" => 23,
                            "cmc7" => 890333333
                        ]
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::VALE_COMPRA_FUNCIONARIO,
                    "id_funcionario" => 2334,
                    "parcelas" => [
                        [
                            "parcela" => 13,
                            "vencimento" => date("Y-m-d H:i:s")
                        ],
                        [
                            "parcela" => 23,
                            "vencimento" => date("Y-m-d H:i:s")
                        ]
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::VALE_PRESENTE,
                    "numero_cartao" => 456,
                    "pagamentos" => [
                        [
                            "valor" => 13
                        ],
                        [
                            "valor" => 23
                        ]
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::CONTA_CORRENTE_CLIENTE,
                    "parcelas" => [
                        [
                            "valor" => 13,
                            "vencimento" => date("Y-m-d H:i:s")
                        ],
                        [
                            "valor" => 23,
                            "vencimento" => date("Y-m-d H:i:s")
                        ]
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::NOTA_DE_CREDITO,
                    "valor_credito_inicial" => 10.00,
                    "numeros_notas" => [
                        "123",
                        "345",
                        "5656"
                    ],
                    "valor_recebido" => 25,
                    "cod_aut_cartao" => 232343,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 455666,
                    "numero_documento" => 5866,
                    "parcelas" => [
                        [
                            "valor" => 13,
                        ],
                        [
                            "valor" => 23,
                        ]
                    ],
                ],
                [
                    "juros" => 1.33,
                    "id_forma_pagamento" => FormasPagamentos::BOLETO,
                    "desconto_a_vista" => 0.10,
                    "desconto_a_prazo" => 0.5,
                    "envio_boleto" => "S",
                    "desconto_boleto" => "S",
                    "radio_msg_boleto" => "N",
                    "texto_msg_boleto" => "N",
                    "parcelas" => [
                        [
                            "parcela" => 13.00,
                            "vencimento" => date("Y-m-d H:i:s")
                        ],
                        [
                            "parcela" => 23.00,
                            "vencimento" => date("Y-m-d H:i:s")
                        ]
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::BOLETO_PROPRIO,
                    "juros" => 0.23,
                    "parcelas" => [
                        [
                            "parcela" => 23,
                            "valor_ajustado" => 23.40,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                        [
                            "parcela" => 13,
                            "valor_ajustado" => 22.60,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::NOTA_PROMISSORIA,
                    "chave_promissoria"  => 12333,
                    "juros" => 0.23,
                    "parcelas" => [
                        [
                            "parcela" => 23,
                            "valor_ajustado" => 23.40,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                        [
                            "parcela" => 13,
                            "valor_ajustado" => 22.60,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                    ],
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::CARTAO_CREDITO_AURA,
                    "chave_promissoria"  => 12333,
                    "parcelas" => [
                        [
                            "parcela" => 12.40,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ],
                        [
                            "parcela" => 18.10,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ]
                    ]
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::CARTAO_CREDITO_SOROCRED,
                    "parcelas" => [
                        [
                            "parcela" => 12.40,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ],
                        [
                            "parcela" => 18.10,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ]
                    ],
                    "id_nota" => 123,
                ],
                [
                    "id_forma_pagamento" => FormasPagamentos::CARNE,
                    "parcelas" => [
                        [
                            "valor" => 23,
                            "valor_ajustado" => 23.40,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                        [
                            "valor" => 13,
                            "valor_ajustado" => 22.60,
                            "multa" => 2,
                            "vencimento" => date("Y-m-d H:i:s"),
                        ],
                    ],
                    "numero_contrato" => 12243,
                    "numero_documento" => 123,
                    "id_tipo_documento" => 1,
                    "id_fornecedor" => 1,
                    "cod_aut_cartao" => 1222,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 343345,
                ],
                [
                    "id_forma_pagamento" => 3,
                    "chave_promissoria"  => 12333,
                    "parcelas" => [
                        [
                            "parcela" => 12.40,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ],
                        [
                            "parcela" => 18.10,
                            "vencimento" => date("Y-m-d H:i:s"),
                            "cod_aut_cartao" => 12333,
                            "id_credenciadora" => 1,
                            "cnpj_credenciadora" => 877689990,
                            "multa" => 2.00,
                        ]
                    ]
                ],
                [
                    "id_forma_pagamento" => 1,
                    "pagamentos" => [
                        [
                            "valor"  => 0
                        ]
                    ]
                ]

            ],
            "observacao" => ""
        ];

        return $this->_requetBodyConverter->deserializerConteudo(new FinalizarVendaDTO(), json_encode($formaPagamentoDTO));
    }
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_vale_cheques()
    {
        // Make call to application...
        $formaPg = [
            "id_forma_pagamento" => FormasPagamentos::CHEQUE,
            "cheques" => [
                [
                    "valor" => 13,
                    "cmc7" => 89033333
                ],
                [
                    "valor" => 23,
                    "cmc7" => 890333333
                ]
            ],
        ];

        $cheque = $this->_setup->fabricaFormaPagamento($formaPg);
        $cheque->validar($formaPg);
        $this->assertEquals(ChequeDTO::class, get_class($cheque));
        $this->assertEquals((23 + 13), $cheque->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_vale_compra_funcionario()
    {
        // Make call to application...
        $formaPg = [
            "id_forma_pagamento" => FormasPagamentos::VALE_COMPRA_FUNCIONARIO,
            "id_funcionario" => 2334,
            "parcelas" => [
                [
                    "parcela" => 13,
                    "vencimento" => date("Y-m-d H:i:s")
                ],
                [
                    "parcela" => 23,
                    "vencimento" => date("Y-m-d H:i:s")
                ]
            ],
        ];

        $valeCompraFuncionario = $this->_setup->fabricaFormaPagamento($formaPg);
        $valeCompraFuncionario->validar($formaPg);
        $this->assertEquals(ValeComprasFuncionarioDTO::class, get_class($valeCompraFuncionario));
        $this->assertEquals((23 + 13), $valeCompraFuncionario->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_vale_presentes()
    {
        // Make call to application...
        $valePresente = [
            "id_forma_pagamento" => FormasPagamentos::VALE_PRESENTE,
            "numero_cartao" => 456,
            "pagamentos" => [
                [
                    "valor" => 13
                ],
                [
                    "valor" => 23
                ]
            ],
        ];

        $valePresente = $this->_setup->fabricaFormaPagamento($valePresente);
        $this->assertEquals(ValePresenteDTO::class, get_class($valePresente));
        $this->assertEquals((23 + 13), $valePresente->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_cc_cliente()
    {
        // Make call to application...
        $ccCliente = [
            "id_forma_pagamento" => FormasPagamentos::CONTA_CORRENTE_CLIENTE,
            "parcelas" => [
                [
                    "valor" => 13,
                    "vencimento" => date("Y-m-d H:i:s")
                ],
                [
                    "valor" => 23,
                    "vencimento" => date("Y-m-d H:i:s")
                ]
            ],
        ];

        $ccCliente = $this->_setup->fabricaFormaPagamento($ccCliente);
        $this->assertEquals(ContaCorrenteClienteDTO::class, get_class($ccCliente));
        $this->assertEquals((23 + 13), $ccCliente->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_notas_creditos()
    {
        // Make call to application...
        $notaCredito = [
            "id_forma_pagamento" => FormasPagamentos::NOTA_DE_CREDITO,
            "valor_credito_inicial" => 10.00,
            "numeros_notas" => [
                "123",
                "345",
                "5656"
            ],
            "valor_recebido" => 25,
            "cod_aut_cartao" => 232343,
            "id_credenciadora" => 1,
            "cnpj_credenciadora" => 455666,
            "numero_documento" => 5866,
            "parcelas" => [
                [
                    "valor" => 13,
                ],
                [
                    "valor" => 23,
                ]
            ],
        ];

        $notaCredito = $this->_setup->fabricaFormaPagamento($notaCredito);
        $this->assertEquals(NotaCreditoDTO::class, get_class($notaCredito));
        $this->assertEquals((23 + 13), $notaCredito->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_boletos()
    {
        // Make call to application...
        $boleto = [
            "juros" => 1.33,
            "id_forma_pagamento" => FormasPagamentos::BOLETO,
            "desconto_a_vista" => 0.10,
            "desconto_a_prazo" => 0.5,
            "envio_boleto" => "S",
            "desconto_boleto" => "S",
            "radio_msg_boleto" => "N",
            "texto_msg_boleto" => "N",
            "parcelas" => [
                [
                    "parcela" => 13.00,
                    "vencimento" => date("Y-m-d H:i:s")
                ],
                [
                    "parcela" => 23.00,
                    "vencimento" => date("Y-m-d H:i:s")
                ]
            ],
        ];

        $boleto = $this->_setup->fabricaFormaPagamento($boleto);
        $this->assertEquals(BoletoDTO::class, get_class($boleto));
        $this->assertEquals((23 + 13), $boleto->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_juros_mora()
    {
        // Make call to application...
        $boletoProprio = [
            "id_forma_pagamento" => FormasPagamentos::BOLETO_PROPRIO,
            "juros" => 0.23,
            "parcelas" => [
                [
                    "parcela" => 23,
                    "valor_ajustado" => 23.40,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
                [
                    "parcela" => 13,
                    "valor_ajustado" => 22.60,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
            ],
        ];

        $boletoProprio = $this->_setup->fabricaFormaPagamento($boletoProprio);
        $this->assertEquals(JurosMoraDTO::class, get_class($boletoProprio));
        $this->assertEquals((23 + 13), $boletoProprio->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_nota_promissoria()
    {
        // Make call to application...
        $notaPromissoria = [
            "id_forma_pagamento" => FormasPagamentos::NOTA_PROMISSORIA,
            "chave_promissoria"  => 12333,
            "juros" => 0.23,
            "parcelas" => [
                [
                    "parcela" => 23,
                    "valor_ajustado" => 23.40,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
                [
                    "parcela" => 13,
                    "valor_ajustado" => 22.60,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
            ],
        ];

        $notaPromissoria = $this->_setup->fabricaFormaPagamento($notaPromissoria);
        $this->assertEquals(NotaPromissoriaDTO::class, get_class($notaPromissoria));
        $this->assertEquals((23 + 13), $notaPromissoria->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_credito_aura()
    {
        // Make call to application...
        $creditoAura = [
            "id_forma_pagamento" => FormasPagamentos::CARTAO_CREDITO_AURA,
            "chave_promissoria"  => 12333,
            "parcelas" => [
                [
                    "parcela" => 12.40,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ],
                [
                    "parcela" => 18.10,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ]
            ]
        ];

        $creditoAura = $this->_setup->fabricaFormaPagamento($creditoAura);
        $this->assertEquals(CartaoCreditoAuraDTO::class, get_class($creditoAura));
        $this->assertEquals((12.40 + 18.10), $creditoAura->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_credito_sorocred()
    {
        // Make call to application...
        $sorocred = [
            "id_forma_pagamento" => FormasPagamentos::CARTAO_CREDITO_SOROCRED,
            "parcelas" => [
                [
                    "parcela" => 12.40,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ],
                [
                    "parcela" => 18.10,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ]
            ],
            "id_nota" => 123,
        ];

        $sorocred = $this->_setup->fabricaFormaPagamento($sorocred);
        $this->assertEquals(CartaoCreditoSorocredDTO::class, get_class($sorocred));
        $this->assertEquals((12.40 + 18.10), $sorocred->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_carne()
    {
        // Make call to application...
        $carne = [
            "id_forma_pagamento" => FormasPagamentos::CARNE,
            "parcelas" => [
                [
                    "valor" => 23,
                    "valor_ajustado" => 23.40,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
                [
                    "valor" => 13,
                    "valor_ajustado" => 22.60,
                    "multa" => 2,
                    "vencimento" => date("Y-m-d H:i:s"),
                ],
            ],
            "numero_contrato" => 12243,
            "numero_documento" => 123,
            "id_tipo_documento" => 1,
            "id_fornecedor" => 1,
            "cod_aut_cartao" => 1222,
            "id_credenciadora" => 1,
            "cnpj_credenciadora" => 343345,
        ];

        $carne = $this->_setup->fabricaFormaPagamento($carne);
        $this->assertEquals(CarneDTO::class, get_class($carne));
        $this->assertEquals((23 + 13), $carne->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_credito()
    {
        // Make call to application...
        $credito = [
            "id_forma_pagamento" => 3,
            "chave_promissoria"  => 12333,
            "parcelas" => [
                [
                    "parcela" => 12.40,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ],
                [
                    "parcela" => 18.10,
                    "vencimento" => date("Y-m-d H:i:s"),
                    "cod_aut_cartao" => 12333,
                    "id_credenciadora" => 1,
                    "cnpj_credenciadora" => 877689990,
                    "multa" => 2.00,
                ]
            ]
        ];

        $credito = $this->_setup->fabricaFormaPagamento($credito);
        $this->assertEquals(ParceladoDTO::class, get_class($credito));
        $this->assertEquals((12.40 + 18.10), $credito->getTotalPgto());
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function verify_montagem_forma_pagamento_debito()
    {
        // Make call to application...
        $debito = [
            "id_forma_pagamento" => 1,
            "pagamentos" => [
                [
                    "valor"  => 0
                ]
            ]
        ];

        $debito = $this->_setup->fabricaFormaPagamento($debito);
        $this->assertEquals(DebitoDTO::class, get_class($debito));
    }
}
