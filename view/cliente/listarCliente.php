<!-- DataTables -->
<link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= ENDERECO; ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Topo do arquivo com os breadCrumbs -->
<?php include 'layout/content-header.php'; ?>
<!-- Inicio do card com o menu de ações -->
<?php include 'layout/card-header.php'; ?>

<!-- Conteudo do Arquivo  -->
<div class="card-body">
  <table id="clientesDataTable" data-url="<?= ENDERECO . '/api/cliente_api.php?op=' . md5('buscaClientes'); ?>" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Código Cliente</th>
        <th>Nome</th>
        <th>Razão Social</th>
        <th>CPF/CNPJ</th>
        <th>Telefone</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody id="bodyClientes">

    </tbody>
    <tfoot>
      <tr>
        <th>Código Cliente</th>
        <th>Nome</th>
        <th>Razão Social</th>
        <th>CPF/CNPJ</th>
        <th>Telefone</th>
        <th>Ações</th>
      </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->

<!-- Fechamento do card e da section  -->
<?php include 'layout/card-footer.php'; ?>
