<!DOCTYPE html>
<html lang="pt-br">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Arquivo com Funcoes de Banco de Dados
require "config/database.php";
// Verifica se o usuário está logado
require "includes/verifica.php";
// Arquivo com funcoes gerais do sistema
include "includes/functions.php";

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebControl Empresas | Tela Inicial</title>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/fontawesome-free/css/all.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/dist/css/adminlte.css">
</head>

