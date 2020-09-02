<?php

Route::prefix('whatsapp')->group(function () {
   /**
    *  Pesquisa de Numeros Whatsapp
    */

   Route::prefix('telefones')->group(function () {
      Route::get('{nomeLista}', 'WhatsApp\\WhatsAppController@pesquisaListaTelefonePeloNome');
   });

   Route::prefix('listas')->group(function () {
      Route::get('{idLista}/{termoPesquisa}', 'WhatsApp\\WhatsAppController@pesquisaListaTelefonePeloFoneNome');
   });
});
