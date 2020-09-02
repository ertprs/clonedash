<?php


// ROTAS DA COMANDA
Route::prefix('comanda')->group(function () {
    /**
     * Anotações
     */
    Route::prefix('anotacoes')->group(function () {
        Route::post('{itemVenda}', 'Comanda\\ComandaController@salvaAnotacao');
    });

    /**
     * Produtos
     */
    Route::prefix('produtos')->group(function () {
        Route::get('', 'Comanda\\ComandaController@pesquisaProdutoComanda');
    });
    /**
     * Mesas
     */
    Route::prefix('mesa')->group(function () {

        Route::prefix('qtd')->group(function () {
            Route::post('{cmMesa}/{numeroPessoas}',  'Comanda\\MesaController@atualizaQuantidadePessoa');
        });

        Route::get('',  'Comanda\\MesaController@list');
        Route::get('{cmMesa}', 'Comanda\\MesaController@get');
        Route::post('{id}', 'Comanda\\MesaController@save');
        Route::put('{id}', 'Comanda\\MesaController@update');
        Route::delete('{id}', 'Comanda\\MesaController@delete');
    });

    /**
     * Produção 
     */
    Route::prefix('producao')->group(function () {
        Route::post('{venda}', 'Comanda\\ProducaoController@enviaProducao');
    });

    /**
     * Vendas refente a comanda 
     */
    Route::prefix('venda')->group(function () {

        Route::prefix('taxa')->group(function () {
            Route::post('',  'Comanda\\VendaComandaController@salvaTaxa');
        });

        Route::prefix('itens')->group(function () {

            Route::post('',  'Comanda\\VendaComandaController@salvanovoItem');
            Route::delete('', 'Comanda\\VendaComandaController@removeItem');
        });

    });

    Route::prefix('dados')->group(function () {
        Route::post('', 'Comanda\\ComandaController@vincularCliente');
    });

    /**
     * Comandas
     */
    Route::get('', 'Comanda\\ComandaController@list');
    Route::get('{numeroComanda}', 'Comanda\\ComandaController@getComanda');
    Route::post('{numeroComanda}', 'Comanda\\ComandaController@saveComanda');
    Route::put('{id}', 'Comanda\\ComandaController@update');
    Route::delete('{id}', 'Comanda\\ComandaController@delete');
    
    Route::prefix('qtd')->group(function () {
        Route::post('{numeroComanda}/{numeroPessoas}',  'Comanda\\ComandaController@atualizaQuantidadePessoa');
    });
});