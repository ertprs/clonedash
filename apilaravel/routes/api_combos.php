<?php

Route::prefix('combos')->group(function () {
   /**
    *  Pesquisa de fornecedores
    */

    Route::get('fornecedores', 'Utils\\CombosController@fornecedores');
    Route::get('categorias-produtos', 'Utils\\CombosController@categorias');
    Route::get('tipo-logradouros', 'Utils\\CombosController@tipoLogradouros');
    Route::get('ufs', 'Utils\\CombosController@siglasUF');

    Route::get('bancos', 'Utils\\CombosController@bancos');
    Route::get('estados-civis', 'Utils\\CombosController@estadosCivis');
    Route::get('tipos-residencia', 'Utils\\CombosController@tipoResidencias');
    Route::get('graus-instrucao', 'Utils\\CombosController@grauInstrucoes');
    Route::get('horario-trabalho', 'Utils\\CombosController@horarioTrabalhos');
    Route::get('vendedores', 'Utils\\CombosController@vendedores');
    Route::get('marcas', 'Utils\\CombosController@marcas');
    Route::get('modelos/{idMarca}', 'Utils\\CombosController@modelos');
    Route::get('compartilhamentos', 'Utils\\CombosController@compartilhamentos');
    Route::get('unidades', 'Utils\\CombosController@unidades');
    Route::get('fabricantes', 'Utils\\CombosController@fabricantes');
    Route::get('transportadoras', 'Utils\\CombosController@transportadoras');
    Route::get('transportadoras-placas/{idTransportadora}', 'Utils\\CombosController@transportadorasPlacas');
    Route::get('cidade/{uf}', 'Utils\\CombosController@cidadesPorEstado');
    Route::get('bairros/{idCidade}', 'Utils\\CombosController@bairros');
    Route::get('auto-marcas', 'Utils\\CombosController@autoMarcas');
    Route::get('tipos-atendimentos', 'Utils\\CombosController@tiposDeAtendimentos');
    Route::get('formas-pagamentos', 'Utils\\CombosController@formasDePagamentos');
    Route::get('situacoes', 'Utils\\CombosController@situacoes');

    Route::get('tipo-permissoes-usuarios', 'Utils\\CombosController@tipoPermissoesUsuarios');
    Route::get('modulos', 'Utils\\CombosController@modulos');
    Route::get('sub-modulos/{idModulo}', 'Utils\\CombosController@subModulos');
    Route::get('novos-usuarios', 'Utils\\CombosController@novosUsuarios');
    
    Route::get('motivos-desoneracao-icms', 'Utils\\CombosController@MotivoDesoneracaoIcms');
    Route::get('cfops', 'Utils\\CombosController@cfops');
    
    Route::get('nfe-paises', 'Utils\\CombosController@nfePaises');
    Route::get('nfe-exigibilidade', 'Utils\\CombosController@nfeExigibilidade');
    Route::get('nfe-situacao-tributaria', 'Utils\\CombosController@nfeSituacaoTributaria');
    Route::get('nfe-municipios', 'Utils\\CombosController@nfeMunipios');
    Route::get('nfe-estados', 'Utils\\CombosController@nfeEstados');
    Route::get('nfe-lista-servicos', 'Utils\\CombosController@nfeListaServicos');
    Route::get('nfe-modalidades', 'Utils\\CombosController@nfeModalidades');
    Route::get('nfe-origens', 'Utils\\CombosController@nfeListaServico');
    
    Route::get('icms-situacao-tributaria', 'Utils\\CombosController@icmsSituacaoTributaria');
    Route::get('cartorios', 'Utils\\CombosController@cartorios'); #passar cidade e estaod por parametro ?cidade=cidade&estado=estado

    
});
