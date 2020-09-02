<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Arquivo com Funcoes de Banco de Dados
require "../config/database.php";
// Controller Login
require "../config/api.php";
// Arquivo Verifica Sessao
include "../includes/verifica.php";
// Arquivo com funcoes gerais do sistema
// include "../includes/functions.php";

if (!isset($_REQUEST["op"]) || empty($_REQUEST["op"])) exit;

$Op = $_REQUEST["op"];

defined("VENDAS_REALIZADAS")           || define("VENDAS_REALIZADAS",           md5("vendasRealizadas"));
defined("CLIENTES_NOVOS")              || define("CLIENTES_NOVOS",              md5("clientesNovos"));
defined("PRODUTOS_VENDIDOS")           || define("PRODUTOS_VENDIDOS",           md5("produtosVendidos"));
defined("PRODUTOS_MAIS_VENDIDOS_MES")  || define("PRODUTOS_MAIS_VENDIDOS_MES",  md5("produtosMaisVendidosMes"));

// Modulo da API
$modulo = 'dashboard';

$urlApi = API . $modulo;

// Atribui ao Header o token de segurança definido no arquivo verifica.php
$header['Authorization'] = $Authorization;

$dados = '';

$enderecoRetorno = ENDERECO;

// Muda de acordo com a chamada mas a maioria é post
$tpRequisicao = 'GET';

// array de retorno com as informações
$retorno = [];

switch ($Op) {

  case VENDAS_REALIZADAS:

    $status = false;

    $msg = "";

    $urlApi = $urlApi . '/total-venda-dia';

    $api = new apiConnect;

    $vendasRealizadas = $api->envia($header, $dados, $urlApi, $tpRequisicao);

    $conteudo = [];

    if ($vendasRealizadas['status_http'] == 200) {
      // Se tudo ocorrer bem, da a mensagem de boas vindas e grava a sessão do usuário
      $status   = true;
      $conteudo = $vendasRealizadas['conteudo'];
      $conteudo = sprintf('%04d',$conteudo);
    }

    $retorno['conteudo'] = $conteudo;
    $retorno['status']   = $status;
    $retorno['msg']      = $msg;

    echo json_encode($retorno);

    break;

  case CLIENTES_NOVOS:

    $status = false;

    $msg = "";

    $urlApi = $urlApi . '/total-clientes-cadastrados-dia';

    $api = new apiConnect;

    $clientesNovos = $api->envia($header, $dados, $urlApi, $tpRequisicao);

    $conteudo = [];

    if ($clientesNovos['status_http'] == 200) {
      // Se tudo ocorrer bem, da a mensagem de boas vindas e grava a sessão do usuário
      $status   = true;
      $conteudo = $clientesNovos['conteudo'];
      $conteudo = $conteudo[0]['total'];
      $conteudo = sprintf('%04d',$conteudo);
    }

    $retorno['conteudo'] = $conteudo;
    $retorno['status']   = $status;
    $retorno['msg']      = $msg;

    echo json_encode($retorno);

    break;

  case PRODUTOS_VENDIDOS:

    $status = false;

    $msg = "";

    $urlApi = $urlApi . '/total-itens-vendidos-dia';

    $api = new apiConnect;

    $produtosVendidos = $api->envia($header, $dados, $urlApi, $tpRequisicao);

    $conteudo = [];

    if ($produtosVendidos['status_http'] == 200) {
      // Se tudo ocorrer bem, da a mensagem de boas vindas e grava a sessão do usuário
      $status   = true;
      $conteudo = $produtosVendidos['conteudo'];
      $conteudo = sprintf('%04d',$conteudo);
    }

    $retorno['conteudo'] = $conteudo;
    $retorno['status']   = $status;
    $retorno['msg']      = $msg;

    echo json_encode($retorno);

    break;

  case PRODUTOS_MAIS_VENDIDOS_MES:

    $status = false;

    $msg = "";

    $urlApi = $urlApi . '/top-vendidos-mes';

    $api = new apiConnect;

    $maisVendidos = $api->envia($header, $dados, $urlApi, $tpRequisicao);

    $conteudo = [];

    if ($maisVendidos['status_http'] == 200) {
      // Se tudo ocorrer bem, da a mensagem de boas vindas e grava a sessão do usuário
      $status   = true;
      $conteudo = $maisVendidos['conteudo'];
    }

    $retorno['conteudo'] = $conteudo;
    $retorno['status']   = $status;
    $retorno['msg']      = $msg;

    echo json_encode($retorno);

    break;


  default:
    $retorno['endereco'] = ENDERECO;
    $retorno['status']   = false;
    $retorno['msg']      = "Nenhuma ação definida.";

    echo json_encode($retorno);
}
