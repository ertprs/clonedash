<aside class="main-sidebar elevation-4 sidebar-light-navy">
  <!-- Brand Logo -->
  <a href="<?= ENDERECO; ?>" class="brand-link">
    <img src="<?= ENDERECO; ?>/dist/img/logomarcas/47985.png" alt="WebControl Empresas" class="brand-image">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="fas fa-cogs"></i>
            <p>
              Gestão Empresarial
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ENDERECO; ?>/cliente/listar" class="nav-link">
                <i class="fas fa-user-tag"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
