<?php include "view/layout/head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" data-action="<?= $action; ?>">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include "view/layout/navbar.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include "view/layout/sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php
      $file = $action . $modulo . '.php';

      $caminho = 'view/' . $modulo . '/' . $file;

      if (!file_exists($caminho)) {
        $caminho = 'view/404/404.php';
        $modulo  = '404';
      }

      include $caminho;

      ?>

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include "view/layout/footer.php"; ?>

  </div>
  <!-- ./wrapper -->


  <!-- General Scripts  -->
  <?php include "includes/scripts.php"; ?>

  <!-- DataTables -->
  <script src="<?= ENDERECO; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= ENDERECO; ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= ENDERECO; ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= ENDERECO; ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- ChartJS -->
  <script src="<?= ENDERECO; ?>/plugins/chart.js/Chart.min.js"></script>
  <script src="<?= ENDERECO; ?>/dist/js/demo.js"></script>

  <!-- REQUIRED SCRIPTS -->
  <script src="<?= ENDERECO; ?>/dist/js/pages/<?= $modulo; ?>.js"></script>

</body>

</html>
