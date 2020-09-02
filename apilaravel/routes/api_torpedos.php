<?php

// ROTAS DOS RELATÓRIOS
Route::prefix('torpedos')->group(function () {
    /**
     * Telefones
     */
    Route::prefix('telefones')->group(function () {
        Route::get('{nomeLista}', 'Torpedo\\TorpedoController@pesquisaListaTelefonePeloNome');
    });
    /**
     * Listas
     */
    Route::prefix('listas')->group(function () {
        Route::get('{idLista}/{termoPesquisa}', 'Torpedo\\TorpedoController@pesquisaListaTelefonePeloFoneNome');
    });
});