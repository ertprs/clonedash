<?php

namespace App\Services\Extensions;

use App\Services\Repository\Contracts as RepositoryInterfaceServices;
use App\Services\Repository\Eloquent as RepositoryEloquentServices;
use App\Repository\Contracts as RepositoryInterface;
use App\Repository\Eloquent as RepositoryEloquent;

/**
 * @author Tiago Franco
 * Classe que devera conter todos os binds de repositorios e repositorios services
 */
class BindsRepositorios
{
    public function __construct($app)
    {
        //Bind do repositorio services de clientes
        $app->bind(RepositoryInterfaceServices\Model\Cliente\ClienteRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Cliente\ClienteEloquentRepositoryService::class);
        //Bind do repositorio de clientes
        $app->bind(RepositoryInterface\Model\Cliente\ClienteRepositoryInterface::class, RepositoryEloquent\Model\Cliente\ClienteEloquentRepository::class);

        //Bind do repositorio services de relatorio campos
        $app->bind(RepositoryInterfaceServices\Model\Relatorio\RelatorioCamposRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Relatorio\RelatorioCamposEloquentRepositoryService::class);
        //Bind do repositorio de relatorio campos
        $app->bind(RepositoryInterface\Model\Relatorio\RelatorioCamposRepositoryInterface::class, RepositoryEloquent\Model\Relatorio\RelatorioCamposEloquentRepository::class);

        //Bind do repositorio services de titulos receba facil
        $app->bind(RepositoryInterfaceServices\Model\Cs2\TitulosRecebaFacilRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Cs2\TitulosRecebaFacilEloquentRepositoryService::class);
        //Bind do repositorio  de titulos receba facil
        $app->bind(RepositoryInterface\Model\Cs2\TitulosRecebaFacilRepositoryInterface::class, RepositoryEloquent\Model\Cs2\TitulosRecebaFacilEloquentRepository::class);

        //Bind do repositorio services de carnês
        $app->bind(RepositoryInterfaceServices\Model\Venda\CarneRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\CarneEloquentRepositoryService::class);
        //Bind do repositorio  de carnês
        $app->bind(RepositoryInterface\Model\Venda\CarneRepositoryInterface::class, RepositoryEloquent\Model\Venda\CarneEloquentRepository::class);

        //Bind do repositorio services de contas pagar
        $app->bind(RepositoryInterfaceServices\Model\ContasPagar\ContasPagarRepositoryServiceInterface::class, RepositoryEloquentServices\Model\ContasPagar\ContasPagarEloquentRepositoryService::class);
        //Bind do repositorio  de contas pagar
        $app->bind(RepositoryInterface\Model\ContasPagar\ContasPagarRepositoryInterface::class, RepositoryEloquent\Model\ContasPagar\ContasPagarEloquentRepository::class);

        //Bind do repositorio services de vendas
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaEloquentRepositoryService::class);
        //Bind do repositorio  de vendas
        $app->bind(RepositoryInterface\Model\Venda\VendaRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaEloquentRepository::class);

        //Bind do repositorio services de valor inicial caixa
        $app->bind(RepositoryInterfaceServices\Model\FrenteCaixa\ValorInicialCaixaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FrenteCaixa\ValorInicialCaixaEloquentRepositoryService::class);
        //Bind do repositorio  de valor inicial caixa
        $app->bind(RepositoryInterface\Model\FrenteCaixa\ValorInicialCaixaRepositoryInterface::class, RepositoryEloquent\Model\FrenteCaixa\ValorInicialCaixaEloquentRepository::class);

        //Bind do repositorio services de valor inicial caixa
        $app->bind(RepositoryInterfaceServices\Model\Funcionario\FuncionarioicacaoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\ClassificacaoEloquentRepositoryService::class);
        //Bind do repositorio  de valor inicial caixa
        $app->bind(RepositoryInterface\Model\Produto\ClassificacaoRepositoryInterface::class, RepositoryEloquent\Model\Produto\ClassificacaoEloquentRepository::class);

        //Bind do repositorio services de conta corrente movimentacao
        $app->bind(RepositoryInterfaceServices\Model\DadosBancarios\ContaCorrenteMovimentacaoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\DadosBancarios\ContaCorrenteMovimentacaoEloquentRepositoryService::class);
        //Bind do repositorio  de conta corrente movimentacao
        $app->bind(RepositoryInterface\Model\DadosBancarios\ContaCorrenteMovimentacaoRepositoryInterface::class, RepositoryEloquent\Model\DadosBancarios\ContaCorrenteMovimentacaoEloquentRepository::class);

        //Bind do repositorio services do tipo logradouros
        $app->bind(RepositoryInterfaceServices\Model\Apoio\TipoLogRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Apoio\TipoLogEloquentRepositoryService::class);
        //Bind do repositorio  do tipo logradouros
        $app->bind(RepositoryInterface\Model\Apoio\TipoLogRepositoryInterface::class, RepositoryEloquent\Model\Apoio\TipoLogEloquentRepository::class);

        //Bind do repositorio services de estado
        $app->bind(RepositoryInterfaceServices\Model\Localizacao\EstadosRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Localizacao\EstadosEloquentRepositoryService::class);
        //Bind do repositorio  de estado
        $app->bind(RepositoryInterface\Model\Localizacao\EstadosRepositoryInterface::class, RepositoryEloquent\Model\Localizacao\EstadosEloquentRepository::class);

        //Bind do repositorio services de fornecedores
        $app->bind(RepositoryInterfaceServices\Model\Fornecedor\FornecedorRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Fornecedor\FornecedorEloquentRepositoryService::class);
        //Bind do repositorio  de fornecedores
        $app->bind(RepositoryInterface\Model\Fornecedor\FornecedorRepositoryInterface::class, RepositoryEloquent\Model\Fornecedor\FornecedorEloquentRepository::class);

        //Bind do repositorio services de produtos
        $app->bind(RepositoryInterfaceServices\Model\Produto\ProdutoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\ProdutoEloquentRepositoryService::class);
        //Bind do repositorio  de produtos
        $app->bind(RepositoryInterface\Model\Produto\ProdutoRepositoryInterface::class, RepositoryEloquent\Model\Produto\ProdutoEloquentRepository::class);

        //Bind do repositorio services de funcionarios
        $app->bind(RepositoryInterfaceServices\Model\Funcionario\FuncionarioRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Funcionario\FuncionarioEloquentRepositoryService::class);
        //Bind do repositorio  de funcionarios
        $app->bind(RepositoryInterface\Model\Funcionario\FuncionarioRepositoryInterface::class, RepositoryEloquent\Model\Funcionario\FuncionarioEloquentRepository::class);

        //Bind do repositorio services das grades dos produtos
        $app->bind(RepositoryInterfaceServices\Model\Produto\GradeRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\GradeEloquentRepositoryService::class);
        //Bind do repositorio  das grades dos produtos
        $app->bind(RepositoryInterface\Model\Produto\GradeRepositoryInterface::class, RepositoryEloquent\Model\Produto\GradeEloquentRepository::class);

        //Bind do repositorio services das vendas devolucoes
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaDevolucaoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaDevolucaoEloquentRepositoryService::class);
        //Bind do repositorio  das vendas devolucoes
        $app->bind(RepositoryInterface\Model\Venda\VendaDevolucaoRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaDevolucaoEloquentRepository::class);

        //Bind do repositorio services das notas de creditos
        $app->bind(RepositoryInterfaceServices\Model\Venda\NotaCreditoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\NotaCreditoEloquentRepositoryService::class);
        //Bind do repositorio  das notas de creditos
        $app->bind(RepositoryInterface\Model\Venda\NotaCreditoRepositoryInterface::class, RepositoryEloquent\Model\Venda\NotaCreditoEloquentRepository::class);

        //Bind do repositorio services do historico das notas de creditos
        $app->bind(RepositoryInterfaceServices\Model\Venda\NotaCreditoHistoricoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\NotaCreditoHistoricoEloquentRepositoryService::class);
        //Bind do repositorio  do historico das notas de creditos
        $app->bind(RepositoryInterface\Model\Venda\NotaCreditoHistoricoRepositoryInterface::class, RepositoryEloquent\Model\Venda\NotaCreditoHistoricoEloquentRepository::class);

        //Bind do repositorio services das notas de creditos
        $app->bind(RepositoryInterfaceServices\Model\Cliente\ClienteFrenteCaixaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Cliente\ClienteFrenteCaixaEloquentRepositoryService::class);
        //Bind do repositorio  das notas de creditos
        $app->bind(RepositoryInterface\Model\Cliente\ClienteFrenteCaixaRepositoryInterface::class, RepositoryEloquent\Model\Cliente\ClienteFrenteCaixaEloquentRepository::class);

        //Bind do repositorio services dos cadastros
        $app->bind(RepositoryInterfaceServices\Model\Cs2\CadastroRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Cs2\CadastroEloquentRepositoryService::class);
        //Bind do repositorio  dos cadastros
        $app->bind(RepositoryInterface\Model\Cs2\CadastroRepositoryInterface::class, RepositoryEloquent\Model\Cs2\CadastroEloquentRepository::class);

        //Bind do repositorio services do controle dos boletos
        $app->bind(RepositoryInterfaceServices\Model\Cs2\ControlesBoletoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Cs2\ControlesBoletoEloquentRepositoryService::class);
        //Bind do repositorio  do controle dos boletos
        $app->bind(RepositoryInterface\Model\Cs2\ControlesBoletoRepositoryInterface::class, RepositoryEloquent\Model\Cs2\ControlesBoletoEloquentRepository::class);


        //Bind do repositorio services whatsapp
        $app->bind(RepositoryInterfaceServices\Model\Whatsapp\WhatsappListaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Whatsapp\WhatsappListaEloquentRepositoryService::class);
        //Bind do repositorio  whatsapp
        $app->bind(RepositoryInterface\Model\Whatsapp\WhatsappListaRepositoryInterface::class, RepositoryEloquent\Model\Whatsapp\WhatsappListaEloquentRepository::class);

        //Bind do repositorio services de torpedos
        $app->bind(RepositoryInterfaceServices\Model\Torpedo\TorpedoListaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Torpedo\TorpedoListaEloquentRepositoryService::class);
        //Bind do repositorio  de torpedos
        $app->bind(RepositoryInterface\Model\Torpedo\TorpedoListaRepositoryInterface::class, RepositoryEloquent\Model\Torpedo\TorpedoListaEloquentRepository::class);

        //Bind do repositorio services de usuarios
        $app->bind(RepositoryInterfaceServices\UserRepositoryServiceInterface::class, RepositoryEloquentServices\UserEloquentRepositoryService::class);
        //Bind do repositorio  de usuarios
        $app->bind(RepositoryInterface\UserRepositoryInterface::class, RepositoryEloquent\UserEloquentRepository::class);

        //Bind do repositorio services de convenios bancarios
        $app->bind(RepositoryInterfaceServices\Model\Convenio\ConvenioBancarioRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Convenio\ConvenioBancarioEloquentRepositoryService::class);
        //Bind do repositorio  de convenios bancarios
        $app->bind(RepositoryInterface\Model\Convenio\ConvenioBancarioRepositoryInterface::class, RepositoryEloquent\Model\Convenio\ConvenioBancarioEloquentRepository::class);

        //Bind do repositorio services das comandas
        $app->bind(RepositoryInterfaceServices\Model\Comanda\CmComandaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Comanda\CmComandaEloquentRepositoryService::class);
        //Bind do repositorio  das comandas
        $app->bind(RepositoryInterface\Model\Comanda\CmComandaRepositoryInterface::class, RepositoryEloquent\Model\Comanda\CmComandaEloquentRepository::class);

        //Bind do repositorio services das mesas das comandas
        $app->bind(RepositoryInterfaceServices\Model\Comanda\CmMesaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Comanda\CmMesaEloquentRepositoryService::class);
        //Bind do repositorio  das mesas das comandas
        $app->bind(RepositoryInterface\Model\Comanda\CmMesaRepositoryInterface::class, RepositoryEloquent\Model\Comanda\CmMesaEloquentRepository::class);

        //Bind do repositorio services fake das vendas relacionadas a comandas
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaComandaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaComandaEloquentRepositoryService::class);
        //Bind do repositorio fake  das vendas relacionadas a comandas
        $app->bind(RepositoryInterface\Model\Venda\VendaComandaRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaComandaEloquentRepository::class);

        //Bind do repositorio services dos itens das vendas
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaItemRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaItemEloquentRepositoryService::class);
        //Bind do repositorio fdos itens das vendas
        $app->bind(RepositoryInterface\Model\Venda\VendaItemRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaItemEloquentRepository::class);

        //Bind do repositorio services das formas de pagamentos dos clientes
        $app->bind(RepositoryInterfaceServices\Model\FormaPagamento\ClienteFormaPagamentoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FormaPagamento\ClienteFormaPagamentoEloquentRepositoryService::class);
        //Bind do repositorio das formas de pagamentos dos clientes
        $app->bind(RepositoryInterface\Model\FormaPagamento\ClienteFormaPagamentoRepositoryInterface::class, RepositoryEloquent\Model\FormaPagamento\ClienteFormaPagamentoEloquentRepository::class);

        //Bind do repositorio services das formas de pagamentos
        $app->bind(RepositoryInterfaceServices\Model\FormaPagamento\FormaPagamentoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FormaPagamento\FormaPagamentoEloquentRepositoryService::class);
        //Bind do repositorio das formas de pagamentos
        $app->bind(RepositoryInterface\Model\FormaPagamento\FormaPagamentoRepositoryInterface::class, RepositoryEloquent\Model\FormaPagamento\FormaPagamentoEloquentRepository::class);

        //Bind do repositorio services das formas de pagamentos dos clientes
        $app->bind(RepositoryInterfaceServices\Model\FormaPagamento\ClienteFormaPagamentoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FormaPagamento\ClienteFormaPagamentoEloquentRepositoryService::class);
        //Bind do repositorio das formas de pagamentos dos clientes
        $app->bind(RepositoryInterface\Model\FormaPagamento\ClienteFormaPagamentoRepositoryInterface::class, RepositoryEloquent\Model\FormaPagamento\ClienteFormaPagamentoEloquentRepository::class);

        //Bind do repositorio services das formas de pagamentos por cartao fidelidade
        $app->bind(RepositoryInterfaceServices\Model\FormaPagamento\CartaoFidConfigRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FormaPagamento\CartaoFidConfigEloquentRepositoryService::class);
        //Bind do repositorio das formas de pagamentos por cartao fidelidade
        $app->bind(RepositoryInterface\Model\FormaPagamento\CartaoFidConfigRepositoryInterface::class, RepositoryEloquent\Model\FormaPagamento\CartaoFidConfigEloquentRepository::class);

        //Bind do repositorio services dos kits de produtos
        $app->bind(RepositoryInterfaceServices\Model\Kits\PromocaoKitRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Kits\PromocaoKitEloquentRepositoryService::class);
        //Bind do repositorio dos kits de produtos
        $app->bind(RepositoryInterface\Model\Kits\PromocaoKitRepositoryInterface::class, RepositoryEloquent\Model\Kits\PromocaoKitEloquentRepository::class);

        //Bind do repositorio services da promocao do mais por menos
        $app->bind(RepositoryInterfaceServices\Model\Produto\PromocaoQuantidadeRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\PromocaoQuantidadeEloquentRepositoryService::class);
        //Bind do repositorio da promocao do mais por menos
        $app->bind(RepositoryInterface\Model\Produto\PromocaoQuantidadeRepositoryInterface::class, RepositoryEloquent\Model\Produto\PromocaoQuantidadeEloquentRepository::class);

        //Bind do repositorio services da promocao por grade
        $app->bind(RepositoryInterfaceServices\Model\Produto\GradePromocaoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\GradePromocaoEloquentRepositoryService::class);
        //Bind do repositorio da promocao por grade
        $app->bind(RepositoryInterface\Model\Produto\GradePromocaoRepositoryInterface::class, RepositoryEloquent\Model\Produto\GradePromocaoEloquentRepository::class);

        //Bind do repositorio services das vendas e itens  vendas pela frente de caixa
        $app->bind(RepositoryInterfaceServices\Model\FrenteCaixa\FcVendaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\FrenteCaixa\FcVendaEloquentRepositoryService::class);
        //Bind do repositorio das vendas e itens  vendas pela frente de caixa
        $app->bind(RepositoryInterface\Model\FrenteCaixa\FcVendaRepositoryInterface::class, RepositoryEloquent\Model\FrenteCaixa\FcVendaEloquentRepository::class);

        //Bind do repositorio services dos historicos das grades
        $app->bind(RepositoryInterfaceServices\Model\Produto\GradeHistoricoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Produto\GradeHistoricoEloquentRepositoryService::class);
        //Bind do repositorio dos historicos das grades
        $app->bind(RepositoryInterface\Model\Produto\GradeHistoricoRepositoryInterface::class, RepositoryEloquent\Model\Produto\GradeHistoricoEloquentRepository::class);

        //Bind do repositorio services dos adiantamento das vendas
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaAdiantamentoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaAdiantamentoEloquentRepositoryService::class);
        //Bind do repositorio dos adiantamento das vendas
        $app->bind(RepositoryInterface\Model\Venda\VendaAdiantamentoRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaAdiantamentoEloquentRepository::class);

        //Bind do repositorio services das vendas pagamentos
        $app->bind(RepositoryInterfaceServices\Model\Venda\VendaPagamentoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Venda\VendaPagamentoEloquentRepositoryService::class);
        //Bind do repositorio das vendas pagamentos
        $app->bind(RepositoryInterface\Model\Venda\VendaPagamentoRepositoryInterface::class, RepositoryEloquent\Model\Venda\VendaPagamentoEloquentRepository::class);

        //Bind do repositorio services dos controles de cadastros
        $app->bind(RepositoryInterfaceServices\Model\Controle\CadastroControlesRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Controle\CadastroControlesEloquentRepositoryService::class);
        //Bind do repositorio dos controles de cadastros
        $app->bind(RepositoryInterface\Model\Controle\CadastroControlesRepositoryInterface::class, RepositoryEloquent\Model\Controle\CadastroControlesEloquentRepository::class);

        //Bind do repositorio services dos controles de cadastros
        $app->bind(RepositoryInterfaceServices\Model\Boleto\BoletosTitulosRecebaFacilRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Boleto\BoletosTitulosRecebaFacilEloquentRepositoryService::class);
        //Bind do repositorio dos controles de cadastros
        $app->bind(RepositoryInterface\Model\Boleto\BoletosTitulosRecebaFacilRepositoryInterface::class, RepositoryEloquent\Model\Boleto\BoletosTitulosRecebaFacilEloquentRepository::class);

        //Bind do repositorio services dos controles de cadastros
        $app->bind(RepositoryInterfaceServices\Model\Whatsapp\WhatsappCampanhaRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Whatsapp\WhatsappCampanhaEloquentRepositoryService::class);
        //Bind do repositorio dos controles de cadastros
        $app->bind(RepositoryInterface\Model\Whatsapp\WhatsappCampanhaRepositoryInterface::class, RepositoryEloquent\Model\Whatsapp\WhatsappCampanhaEloquentRepository::class);

        //Bind do repositorio services dos controles de cadastros
        $app->bind(RepositoryInterfaceServices\Model\Whatsapp\WhatsappTransacaoRepositoryServiceInterface::class, RepositoryEloquentServices\Model\Whatsapp\WhatsappTransacaoEloquentRepositoryService::class);
        //Bind do repositorio dos controles de cadastros
        $app->bind(RepositoryInterface\Model\Whatsapp\WhatsappTransacaoRepositoryInterface::class, RepositoryEloquent\Model\Whatsapp\WhatsappTransacaoEloquentRepository::class);


    }
}
