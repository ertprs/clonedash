<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/login', 'Api\\JwtAuthController@login')->name("login");
Route::post('v1/logout', 'Api\\JwtAuthController@logout')->name("logout");

Route::group(['middleware' => ['jwt.verify'], 'prefix' => 'v1'], function(){
    Route::post('/logout', 'Api\\JwtAuthController@logout');

    /***
     * Funcionario
     */ 
    Route::prefix('/funcionarios')->group(function () {
        Route::get('', 'Funcionario\\FuncionarioController@index'); 
        
    });

    /***
     * Relatório    
    Route::prefix('relatorio')->group(function () {
        Route::get('fluxo', 'Relatorio\FluxoController@vendasRealizadas'); 
        
    }); */ 

    /***
     * Cliente
     */ 
    Route::prefix('clientes')->group(function () {
        Route::get('', 'Cliente\\ClienteController@index');
        Route::get('{cliente}', 'Cliente\\ClienteController@pesquisar');
        Route::post('cadastrar', 'Cliente\\ClienteController@cadastrar');
        
    });
    /***
     * Mercado Libere
     */
    Route::prefix('mercadolivre')->group(function () {                
        Route::post('/sync', 'MercadoLivre\\MercadoLivreController@sincronizar');
        Route::get('/produtos-a-sincronizar', 'MercadoLivre\\MercadoLivreController@getProdutosASincrolizar');
    });

    /***
     * Comandas
     */
    include 'api_comandas.php';

    /***
     * Produtos
     */
    include 'api_produtos.php';

    /***
     * Relatorios
     */
    include 'api_relatorios.php';

    /***
     * Torpedos
     */
    include 'api_torpedos.php';

    /***
     * WhatsApp
     */
    include 'api_whatsapp.php';

    /***
     * WhatsApp
     */
    include 'api_frente_caixa.php';

    /***
     * Fornecedores
     */
    include 'api_fornecedores.php';

    /***
     * Combos
     */
    include 'api_combos.php';

    /***
     * Pagamentos
     */
    include 'api_pagamentos.php';

    /***
     * Cartoes (fidelidade etc)
     */
    include 'api_cartoes.php';

    /***
     * Vendas
     */
    include 'api_vendas.php';

    /***
     * Vendas
     */
    include 'api_dashboard.php';
});

/*Receber as notiicacoes do mercado-livre*/
Route::post('/v1/mercadolivre/notificacoes', 'MercadoLivre\\MercadoLivreController@receberNotificacoesMeLivre');

Route::get('/testarFila', 'Cliente\\ClienteController@testarFila');