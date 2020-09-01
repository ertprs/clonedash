<?php

function dataBR($data)
{
  $dataBr = strtotime($data);
  $dataBr = date('d/m/Y H:i:s', $dataBr);
  return $dataBr;
}

function dataSemHoraBR($data)
{
  $dataBr = strtotime($data);
  $dataBr = date('d/m/Y', $dataBr);
  return $dataBr;
}

function apagaImagens($dados, $modulo)
{
  $caminho = "files/" . $modulo . "/" . $dados;
  if (file_exists($caminho)) {
    unlink($caminho);
  }
}

function convertVideo($video)
{
  $regex = "#youtu(be.com|.b)(/embed/|/v/|/watch\?v=|e/|/watch(.+)v=)(.{11})#";
  preg_match_all($regex, $video, $matches);
  return $matches[4][0];
}

// gera senha
function geraChave($tamanho)
{
  $codigo = "";
  for ($x = 1; $x <= $tamanho; $x++) {
    $sec = rand(0, 2);
    switch ($sec) {
      case 0:
        $ri = 48;
        $rf = 57;
        break;
      case 1:
        $ri = 65;
        $rf = 90;
        break;
      case 2:
        $ri = 97;
        $rf = 122;
        break;
      default:
        $ri = 48;
        $rf = 57;
        break;
    }
    $codigo .= chr(rand($ri, $rf));
  }
  return $codigo;
}



function converteUrl($texto)
{
  $texto = utf8_decode($texto);

  $acentos = array(
    'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
    'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
    'C' => '/&Ccedil;/',
    'c' => '/&ccedil;/',
    'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
    'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
    'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
    'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
    'N' => '/&Ntilde;/',
    'n' => '/&ntilde;/',
    'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
    'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
    'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
    'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
    'Y' => '/&Yacute;/',
    'y' => '/&yacute;|&yuml;/',
    '' => '/&ordf;/',
    '' => '/&ordm;/',
    '-' => '/&frasl;/',
    '' => '/&ordf;/'
  );
  $texto = htmlentities($texto, ENT_NOQUOTES);
  $texto = preg_replace($acentos, array_keys($acentos), $texto);

  $texto = html_entity_decode($texto, ENT_NOQUOTES);

  $texto = str_replace('/', '-', $texto);
  $texto = str_replace('\\', '-', $texto);

  $texto = str_replace(array('?', '\\', '"', '(', ')', '!', '$', '%', '[', ']', '{', '}', '\/', '°', 'º', 'ª', '=', '.', ',', ':', ';', '"', '\'', '#', 'ª', '<', '>', '^', '´', '`', '+', '•', '\'', '@', '¨', '&', '*', '²', '³', '£', '¢', '¬', '_'), '', $texto);

  $texto = trim($texto);
  $texto = str_replace(" ", "-", $texto);
  $texto = strtolower($texto);

  $texto = utf8_encode($texto);

  return $texto;
}


function ConvertImage($str)
{
  $str = explode('.', $str);
  $str = $str[0];
  $str = str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($str))));
  return mb_strtolower($str);
}

function ConvertToUrl($str)
{
  $str = str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($str))));
  return mb_strtolower($str);
}


/* limita o numero de caraceteres que sera exibido, ele verifica se nao esta cortando uma palavra */
function limitaCaracter($entrada, $tamanho = '', $pontuacao = '...')
{
  if (!empty($tamanho)) {
    $tam = strlen($entrada) - 1;
    $tamanho = $tamanho > $tam ? $tam : $tamanho;
    if ($tam > $tamanho) {
      while ($entrada[$tamanho] != ' ' && $tamanho < $tam) {
        $tamanho++;
      }
      if ($entrada[$tamanho - 1] == ',' || $entrada[$tamanho - 1] == '.')
        $tamanho--;
      return substr($entrada, 0, $tamanho) . $pontuacao;
    } else {
      return $entrada;
    }
  } else {
    return $entrada;
  }
}

function criaConsulta($texto)
{
  $texto = utf8_decode($texto);

  $acentos = array(
    'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
    'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
    'C' => '/&Ccedil;/',
    'c' => '/&ccedil;/',
    'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
    'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
    'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
    'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
    'N' => '/&Ntilde;/',
    'n' => '/&ntilde;/',
    'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
    'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
    'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
    'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
    'Y' => '/&Yacute;/',
    'y' => '/&yacute;|&yuml;/',
    '' => '/&ordf;/',
    '' => '/&ordm;/',
    '-' => '/&frasl;/',
    '' => '/&ordf;/'
  );

  $texto = htmlentities($texto, ENT_NOQUOTES);

  $texto = preg_replace($acentos, array_keys($acentos), $texto);

  $texto = html_entity_decode($texto, ENT_NOQUOTES);

  $texto = trim($texto);

  $texto = utf8_encode($texto);

  return $texto;
}

function identifica_hyperlink($texto)
{
  $texto = preg_replace("[a-zA-Z]+://([.]?[a-zA-Z0-9_/-])*", "<a href=\"\\0\" target='_blank'>\\0</a>", $texto);
  $texto = preg_replace("(^| )(www([.]?[a-zA-Z0-9_/-])*)", "\\1<a href=\"http://\\2\" target='_blank'>\\2</a>", $texto);
  return $texto;
}




function get_likes($url)
{
  // faz a requisição a API passando a URL como parametro
  $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
  // usando a função json_decode e transformando em um array
  $json = json_decode($json_string, true);
  // retorna o número de likes
  if (isset($json[$url]['shares'])) {
    return intval($json[$url]['shares']);
  } else {
    return 0;
  }
}

function mesAbreviado($mes)
{
  switch ($mes) {
    case '01':
      $mesAbreviado = 'jan';
      break;
    case '02':
      $mesAbreviado = 'fev';
      break;
    case '03':
      $mesAbreviado = 'mar';
      break;
    case '04':
      $mesAbreviado = 'abr';
      break;
    case '05':
      $mesAbreviado = 'mai';
      break;
    case '06':
      $mesAbreviado = 'jun';
      break;
    case '07':
      $mesAbreviado = 'jul';
      break;
    case '08':
      $mesAbreviado = 'ago';
      break;
    case '09':
      $mesAbreviado = 'set';
      break;
    case '10':
      $mesAbreviado = 'out';
      break;
    case '11':
      $mesAbreviado = 'nov';
      break;
    case '12':
      $mesAbreviado = 'dez';
      break;
  }

  return $mesAbreviado;
}

function mesNumerico($mes)
{

  switch ($mes) {
    case "01":
      $mes = "Janeiro";
      break;
    case "02":
      $mes = "Fevereiro";
      break;
    case "03":
      $mes = "Março";
      break;
    case "04":
      $mes = "Abril";
      break;
    case "05":
      $mes = "Maio";
      break;
    case "06":
      $mes = "Junho";
      break;
    case "07":
      $mes = "Julho";
      break;
    case "08":
      $mes = "Agosto";
      break;
    case "09":
      $mes = "Setembro";
      break;
    case "10":
      $mes = "Outubro";
      break;
    case "11":
      $mes = "Novembro";
      break;
    case "12":
      $mes = "Dezembro";
      break;
  }
  return $mes;
}




function ajustaData($data_geral)
{
  list($dia, $mes, $ano) = explode('/', $data_geral);

  switch ($mes) {
    case '01':
      $mes_extenso = 'JAN';
      break;
    case '02':
      $mes_extenso = 'FEV';
      break;
    case '03':
      $mes_extenso = 'MAR';
      break;
    case '04':
      $mes_extenso = 'ABR';
      break;
    case '05':
      $mes_extenso = 'MAI';
      break;
    case '06':
      $mes_extenso = 'JUN';
      break;
    case '07':
      $mes_extenso = 'JUL';
      break;
    case '08':
      $mes_extenso = 'AGO';
      break;
    case '09':
      $mes_extenso = 'SET';
      break;
    case '10':
      $mes_extenso = 'OUT';
      break;
    case '11':
      $mes_extenso = 'NOV';
      break;
    case '12':
      $mes_extenso = 'DEZ';
      break;
  }

  $data_final = $dia . " " . $mes_extenso . " " . $ano;

  return ($data_final);
}

function ajustaData2($data_geral)
{
  list($ano, $mes) = explode('-', $data_geral);

  switch ($mes) {
    case '01':
      $mes_extenso = 'Janeiro';
      break;
    case '02':
      $mes_extenso = 'Fevereiro';
      break;
    case '03':
      $mes_extenso = 'Mar&ccedil;o';
      break;
    case '04':
      $mes_extenso = 'Abril';
      break;
    case '05':
      $mes_extenso = 'Maio';
      break;
    case '06':
      $mes_extenso = 'Junho';
      break;
    case '07':
      $mes_extenso = 'Julho';
      break;
    case '08':
      $mes_extenso = 'Agosto';
      break;
    case '09':
      $mes_extenso = 'Setembro';
      break;
    case '10':
      $mes_extenso = 'Outubro';
      break;
    case '11':
      $mes_extenso = 'Novembro';
      break;
    case '12':
      $mes_extenso = 'Dezembro';
      break;
  }
  $data_final = ucwords($mes_extenso) . " de " . $ano;
  return ($data_final);
}

function resumo($texto, $tam)
{
  $tam = $tam;
  $total = strlen($texto);
  if ($total > $tam) {
    $palavras = explode(" ", $texto);
    $palavra = "";
    $texto = "";
    $aux = "";
    foreach ($palavras as $k => $v) {
      $palavra = $v;
      $aux .= " " . $palavra;
      $aux = trim($aux);
      if (strlen($aux) <= $tam) {
        $texto = $aux;
      } else {
        $texto .= "...";
        break;
      }
    }
  }
  return $texto;
}

/**
 * @author Weiberlan
 * @param decimal $numeroFormatar variável a ser formatada para gravar no banco
 * @return decimal número corrigido para ser gravado no banco
 */
function gCorrigeNumeroInverte($numeroFormatar, $tipo_moeda = "")
{
  if ($tipo_moeda == "2") {
    $aux = array("R$" => "", "U$" => "", " " => "", "," => "");
  } else {
    $aux = array("R$" => "", "U$" => "", " " => "", "." => "", "," => ".");
  }
  $numeroCorrigido = strtr($numeroFormatar, $aux);
  return $numeroCorrigido;
}

/**
 * @author Weiberlan
 * @param decimal $numeroFormatar variável para ser exibiddo ao usuário
 * @param $tipo_moeda determina o que será substituido
 * @return decimal número corrigido para ser exibiddo ao usuário
 */

function gCorrigeNumero($numeroFormatar, $tipo_moeda = "")
{
  if ($numeroFormatar != 0) {
    if ($tipo_moeda == "2") {
      $numeroFormatar = str_replace(".", ",", $numeroFormatar);
    } else {
      $numeroFormatar = str_replace(",", ".", $numeroFormatar);
    }
  }

  return $numeroFormatar;
}

/**
 * @author Joao Vitor
 * @param int $numero a ser disfarçado
 * @return int número somado a data de atual
 */

function disfarcaNumero($numero)
{
  $disfarce = $numero + date('Y') + date('m') + date('d');

  return $disfarce;
}

/**
 * @author Joao Vitor
 * @param int $numero a ser mostrado
 * @return int número subtraido a data de atual
 */

function mostraNumero($numero)
{
  $numero = $numero - date('Y') - date('m') - date('d');

  return $numero;
}


/**
 * Pega o IP do usuário
 */
function getUserIP()
{
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];

  if (filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
  } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
  } else {
    $ip = $remote;
  }

  return $ip;
}
