<?php

// ROTAS DA COMANDA
Route::prefix('produtos')->group(function () {

    Route::get('{produto}', 'Produto\\ProdutoController@getProduto');
    Route::get('kit-combos/{termoPesquisa}', 'Produto\\ProdutoController@pesquisaProdutoKitCombo');
    Route::get('pesquisa-detalhada/{termoPesquisa}', 'Produto\\ProdutoController@pesquisaDetalhada');
    Route::post('pesquisa-por-nome', 'Produto\\ProdutoController@pesquisaPeloNome');
    Route::post('pesquisa-pela-classificacao/{classificacao}', 'Produto\\ProdutoController@pesquisaPelaClassificacao');
    Route::post('pesquisa-por-id-interna/{idInterna}', 'Produto\\ProdutoController@pesquisaPelaIdInterna');
    
    /***
     * Classificações 
     */
    Route::prefix('categorias')->group(function () {
        Route::get('',     'Produto\\CategoriasProdutosController@categorias');
        Route::get('{idCategoria}', 'Produto\\CategoriasProdutosController@categoria');
    });
});
