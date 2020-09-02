<?php

Route::prefix('frente-caixa')->group(function () {
   /**
    *  Rotas para a FRENTE DE CAIXAs
    */
   Route::get('{numeroCaixa}', 'FrenteCaixa\\FrenteCaixaController@verificaCaixaAberto');
   Route::post('{numeroCaixa}/logar-caixa-aberto', 'FrenteCaixa\\FrenteCaixaController@logarCaixaAberto');
   Route::get('funcionarios/all', 'FrenteCaixa\\FrenteCaixaController@getFuncionarios');

   /**Rotas de lancamentos da vendas e seus itens de venda */
   Route::post('vendas/gravar', 'FrenteCaixa\\FrenteCaixaController@novaVenda');
   Route::post('vendas/{venda}/lancar-item', 'FrenteCaixa\\FrenteCaixaController@novoItemVenda');

   Route::prefix('clientes')->group(function () {
      Route::get('{termoPesquisa}', 'FrenteCaixa\\Cliente\\ClienteController@buscarClientes');
      Route::get('{cliente}/qtde-inadimplencia', 'FrenteCaixa\\Cliente\\ClienteController@buscarQtdeInadimplencia');
   });

   Route::prefix('devolucao')->group(function () {
      Route::get('busca-pedidos/cliente/{cliente}', 'FrenteCaixa\\Devolucao\\DevolucaoController@getVendasConcluidasCliente');
      Route::get('busca-pedidos/produto/{codigoBarra}', 'FrenteCaixa\\Devolucao\\DevolucaoController@getVendasConcluidasClienteProduto');
      Route::get('detalha-pedido/{venda}', 'FrenteCaixa\\Devolucao\\DevolucaoController@detalharPedido');
      Route::post('devolver-produto', 'FrenteCaixa\\Devolucao\\DevolucaoController@devolverProduto');
      Route::post('finalizar-pedido/{venda}', 'FrenteCaixa\\Devolucao\\DevolucaoController@finalizarDevolucao');
   });

   Route::prefix('movimentacoes')->group(function () {
      Route::post('add-credito-cc', 'FrenteCaixa\\Creditos\\CreditoController@incluirCreditos');
      Route::post('add-credito', 'FrenteCaixa\\Creditos\\CreditoController@entradaValores');
      #Route::get('{cliente}/qtde-inadimplencia', 'FrenteCaixa\\Cliente\\ClienteController@buscarQtdeInadimplencia');
   });

   Route::prefix('produtos')->group(function () {
      Route::post('novo', 'FrenteCaixa\\FrenteCaixaController@incluirProduto');
      Route::get('{codigoBarras}/kits', 'FrenteCaixa\\FrenteCaixaController@getPromocaoKitsCodBarras');
      Route::post('calcular-total-desconto-item', 'FrenteCaixa\\FrenteCaixaController@buscaTotalDescontos');
      Route::get('calcular-total-desconto-venda/{venda}', 'FrenteCaixa\\FrenteCaixaController@buscaTotalDescontosDaVenda');
   });

   Route::prefix('servicos')->group(function () {
      Route::post('novo', 'FrenteCaixa\\FrenteCaixaController@incluirServico');
   });

   Route::prefix('sangrias')->group(function () {
      Route::get('limite', 'FrenteCaixa\\Sangria\\SangriaController@getLimite');
      Route::post('efetuar', 'FrenteCaixa\\Sangria\\SangriaController@efetuarSangria');
      #Route::get('{cliente}/qtde-inadimplencia', 'FrenteCaixa\\Cliente\\ClienteController@buscarQtdeInadimplencia');
   });
});
