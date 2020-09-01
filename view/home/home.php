<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Resultados do Dia</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a>Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Vendas Realizadas</span>
            <span id="vendasCard" class="info-box-number" data-url="<?= ENDERECO . '/api/home_api.php?op=' . md5('vendasRealizadas'); ?>">--</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Novos Clientes</span>
            <span id="clientesCard" class="info-box-number" data-url="<?= ENDERECO . '/api/home_api.php?op=' . md5('clientesNovos'); ?>">--</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-12 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box-open"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Produtos Vendidos</span>
            <span id="produtosCard" class="info-box-number" data-url="<?= ENDERECO . '/api/home_api.php?op=' . md5('produtosVendidos'); ?>">--</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">

      <div class="col-md-12">
        <h5 class="mb-4">Resultados <?= mesNumerico(date('m')); ?></h5>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Itens Mais Vendidos no Mês</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="pieChart" data-url="<?= ENDERECO . '/api/home_api.php?op=' . md5('produtosMaisVendidosMes'); ?>" height="150"></canvas>
                </div>
                <!-- ./chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <ul class="chart-legend clearfix">
                  <li style="display: none;"><i class="far fa-circle text-danger"></i> <a id="item1"></a></li>
                  <li style="display: none;"><i class="far fa-circle text-success"></i> <a id="item2"></a></li>
                  <li style="display: none;"><i class="far fa-circle text-warning"></i> <a id="item3"></a></li>
                  <li style="display: none;"><i class="far fa-circle text-info"></i> <a id="item4"></a></li>
                  <li style="display: none;"><i class="far fa-circle text-primary"></i> <a id="item5"></a></li>
                  <li style="display: none;"><i class="far fa-circle text-secondary"></i> <a id="item6"></a></li>
                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
