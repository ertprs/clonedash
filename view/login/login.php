<!DOCTYPE html>
<html lang="pt-br">

<?php

// Definimos a operação a ser realizada pelo usuário
$op = md5('login');

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebControl Empresas | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= ENDERECO; ?>/dist/css/adminlte.css">
</head>

<body class="hold-transition login-page" style="background: url(dist/img/background.jpg);background-size: cover;background-repeat: no-repeat;background-position:center">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card float">
      <div class="card-body login-card-body">
        <div class="login-logo mt-3">
          <a href="#">
            <img src="dist/img/logomarcas/47985.png" alt="Nome da Empresa" class="brand-image">
          </a>
        </div>
        <p class="login-box-msg">Seja Bem Vindo!</p>

        <form id="login" name="login">
          <div class="input-group mb-3">
            <input type="number" name="login" class="form-control form-required" placeholder="Código:">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-tie"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="senha" class="form-control form-required" placeholder="Senha:">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <input hidden name="op" value="<?= $op; ?>">
            <!-- /.col -->
            <div class="col-12 mb-2">
              <button id="submitlogin" data-url="<?= ENDERECO; ?>/api/login_api.php" type="submit" class="btn btn-primary btn-block float-right">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1 text-center">
          <a href="forgot-password.html">Esqueci Minha Senha</a>
        </p>
        <p class="mb-0 text-center">
          <a href="register.html" class="text-center"><u>Quero Ser Cliente!</u></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <div class="loading-bg-login">
    <div class="loading-login">
      <i class="fas fa-circle-notch fa-spin fa-5x"></i>
    </div>
  </div>

  <!-- Scripts  -->
  <?php include 'includes/scripts.php'; ?>
  <!-- Login -->
  <script src="<?= ENDERECO; ?>/dist/js/pages/login.js"></script>

</body>

</html>
