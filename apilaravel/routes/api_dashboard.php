<?php 

Route::prefix('dashboard')->group(function () {
    Route::get('total-venda-dia', 'Dashboard\\DashboardController@totalVendasNoDia');    
    Route::get('total-itens-vendidos-dia', 'Dashboard\\DashboardController@totalItensVendidosNoDia');    
    Route::get('top-vendidos-mes', 'Dashboard\\DashboardController@topProdutoVendidosMes');    

    Route::get('total-clientes-cadastrados-dia', 'Dashboard\\DashboardController@totalCadastrosDoDia');    
});
 
