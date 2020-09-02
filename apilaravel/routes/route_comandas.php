<?php

/***
 * Comandas
 */
Route::prefix('comanda')->group(function () {
    /**
     * Anotações
     */
    Route::prefix('anotacoes')->group(function () {
        Route::post('{id}', 'ComandaController@salva_anotacao');
    });

    /**
     * Produtos
     */
    Route::prefix('produtos')->group(function () {
        Route::get('', 'ComandaController@pesquisaProdutoComanda');
    });
    /**
     * Mesas
     */
    Route::prefix('mesa')->group(function () {

        Route::prefix('qtd')->group(function () {
            Route::post('',  'MesaController@atualiza_quantidade');
        });

        Route::get('',  'MesaController@list');
        Route::get('{id}', 'MesaController@get');
        Route::post('{id}', 'MesaController@save');
        Route::put('{id}', 'MesaController@update');
        Route::delete('{id}', 'MesaController@delete');
    });
    /***
     * Classificações 
     */
    Route::prefix('classificacao')->group(function () {
        Route::get('',     'ClassificacaoController@list');
        Route::get('{id}', 'ClassificacaoController@get');
    });

    /**
     * Produção 
     */
    Route::prefix('producao')->group(function () {
        Route::post('', 'ProducaoController@enviaProducao');
    });

    /**
     * Vendas refente a comanda 
     */
    Route::prefix('venda')->group(function () {

        Route::prefix('taxa')->group(function () {
            Route::post('',  'VendaComandaController@salvaTaxa');
        });

        Route::prefix('itens')->group(function () {

            Route::post('',  'VendaComandaController@salvanovoItem');
            Route::delete('', 'VendaComandaController@removeItem');
        });

        Route::get('',     'ConsignacaoController@list');
        Route::get('{id}', 'ClassificacaoController@get');
    });

    Route::prefix('dados')->group(function () {
        Route::post('', 'ComandaController@set');
    });

    /**
     * Comandas
     */
    Route::get('', 'ComandaController@list');
    Route::get('{id}', 'ComandaController@get_comanda');
    Route::post('{id}', 'ComandaController@save_comanda');
    Route::put('{id}', 'ComandaController@update');
    Route::delete('{id}', 'ComandaController@delete');
});
