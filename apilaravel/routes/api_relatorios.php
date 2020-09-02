<?php

// ROTAS DA COMANDA
Route::prefix('relatorios')->group(function () {

    Route::get('clientes', 'Cliente\\RelatorioClienteController@pesquisaRelatorioClientes');
    
});