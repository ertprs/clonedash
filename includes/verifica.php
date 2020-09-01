<?php
session_start();

// Verificamos se o usuário está logado
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  // Obrigo a fazer o Login
  header("location:" . ENDERECO . "/login");
} else {
  if (time() > $_SESSION['user']['expires_in']) {

    session_destroy();

    header("location:" . ENDERECO . "/login");
  }
  // Defino os dados do usuário pra serem usados ao longo do acesso
  $UserToken = $_SESSION['user']['access_token'];
  // Token de Autenticação enviado no header das api's
  $Authorization = "Bearer " . $UserToken;
  // Arquivo que definirá o destino do usuário com base na Url
  require "rotas.php";
}
