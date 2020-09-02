<?php 

Route::prefix('vendas')->group(function () {
    Route::post('finalizar-venda', 'Venda\\VendaController@finalizarVenda');    
});
 
