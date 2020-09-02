<?php 

Route::get('cartoes-fidelidades', 'FormaPagamento\\CartoesController@getCartoesFidelidade');
Route::get('cartoes-fidelidades-tipo/{tipoCartao}', 'FormaPagamento\\CartoesController@getPorTipo');
 
