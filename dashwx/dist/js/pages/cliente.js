$(document).ready(function () {
  // Verifico a ação do usuário pra definir o que será utilizado deste arquivo
  var action = $(document)[0].body.getAttribute("data-action");
  // Chamo a Api pra inserir os dados

  if (action == "listar") {
    var url = $("#clientesDataTable").data("url");

    fetch(url)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        $.each(data.conteudo, function (key, c) {
          let body = $("#bodyClientes");
          let tr = document.createElement("tr");

          let codigoCliente = document.createElement("td");
          codigoCliente.append(c.id);

          let nome = document.createElement("td");
          nome.append(c.nome);

          let razaoSocial = document.createElement("td");
          razaoSocial.append(c.razao_social);

          let cpfCnpj = document.createElement("td");
          cpfCnpj.append(c.cnpj_cpf);

          let telefone = document.createElement("td");
          telefone.append(c.telefone);

          let actions = document.createElement("td");

          body.append(tr);

          tr.append(
            codigoCliente,
            nome,
            razaoSocial,
            cpfCnpj,
            telefone,
            actions
          );
        });

        $(function () {
          // Start DataTable
          $("#clientesDataTable").DataTable({
            responsive: true,
            autoWidth: false,
          });
        });

        $(".loading-bg").css("display", "none");
      });
  } else if (action == "cadastrar") {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Initialize Select2 Elements
    $(".select2bs4").select2({
      theme: "bootstrap4",
    });

    // Files Inputs
    bsCustomFileInput.init();

    $(".loading-bg").css("display", "none");

  }
});

// Adiciona uma nova div para vincular o cliente a alguma coisa 
$(document).on('click', '#adicionaVincular', function(){
  var url = $(this).data('url');
  $.ajax({
    type: "POST",
    url: url,
    dataType: "html",
    success: function (html) {
      $('#vincularCliente').append(html);
    }
  });
});
// Deleta a Div de vinculo com alguma coisa 
$(document).on('click', '.deletaVincular', function(){
  $(this).parent().parent().remove();
});

// Adiciona uma nova div para vincular o cliente a um novo veiculo 
$(document).on('click', '#adicionaVeiculo', function(){
  var url = $(this).data('url');
  $.ajax({
    type: "POST",
    url: url,
    dataType: "html",
    success: function (html) {
      $('#vincularVeiculos').append(html);
    }
  });
});
// Deleta a div que vincula o cliente ao veiculo 
$(document).on('click', '.deletaVeiculo', function(){
  $(this).parent().parent().remove();
});
