$(document).ready(function () {
  // Vendas Realizadas
  var urlVendas = $("#vendasCard").data("url"),
    vendasRealizadas = 0;

  fetch(urlVendas)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (data.status) {
        vendasRealizadas = data.conteudo;
      }

      $("#vendasCard").html(vendasRealizadas);
    });

  // Clientes Cadastrados
  var urlClientes = $("#clientesCard").data("url"),
    clientesNovos = 0;

  fetch(urlClientes)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (data.status) {
        clientesNovos = data.conteudo;
      }

      $("#clientesCard").html(clientesNovos);
    });

  // Produtos Vendidos
  var urlProdutos = $("#produtosCard").data("url"),
    produtosVendidos = 0;

  fetch(urlProdutos)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (data.status) {
        produtosVendidos = data.conteudo;
      }

      $("#produtosCard").html(produtosVendidos);

      $(".loading-bg").css("display", "none");
    });

  // Produtos Mais Vendidos no Mes
  var urlMaisVendidos = $("#pieChart").data("url"),
    contador = 0,
    labels = [],
    dados = [];

  fetch(urlMaisVendidos)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (data.status) {
        $.each(data.conteudo, function (key, c) {
          contador = key + 1;

          $("#item" + contador).html(c.produto);

          $("#item" + contador).parent().css('display', 'block');

          labels[key] = "Cód.Barra: " + c.codigo_barra + " | " + c.produto;

          dados[key] = c.qtde_vendido;

        });

        //-------------
        // - PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieData = {
          labels: labels,
          datasets: [
            {
              data: dados,
              backgroundColor: [
                "#f56954",
                "#00a65a",
                "#f39c12",
                "#00c0ef",
                "#3c8dbc",
                "#d2d6de",
              ],
            },
          ],
        };
        var pieOptions = {
          legend: {
            display: false,
          },
        };
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
          type: "doughnut",
          data: pieData,
          options: pieOptions,
        });

        //-----------------
        // - END PIE CHART -
        //-----------------
      }

      $(".loading-bg").css("display", "none");
    });
});
