<!-- Topo do arquivo com os breadCrumbs -->
<?php include 'layout/content-header.php'; ?>
<!-- Inicio do card com o menu de ações -->
<?php include 'layout/card-header.php'; ?>

<!-- Conteudo do Arquivo  -->
<div class="card-body">

  <form id="cadastraCliente" name="cadastraCliente">
    <!-- Pessoa Física  -->
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <!-- Nome -->
        <div class="form-group">
          <label>Dados do Cliente:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Nome">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- CPF  -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="CPF">
          </div>
        </div>
      </div>
      <!-- RG  -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-address-card"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="RG">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Órgão Expedidor  -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-university"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Órgão Expedidor">
          </div>
        </div>
      </div>
      <!-- Naturalidade  -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-flag"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Naturalidade">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Data de Nascimento  -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Data de Nascimento" data-inputmask="99/99/99" data-mask>
          </div>
        </div>
      </div>
      <!-- Estado Civil  -->
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Estado Civil</option>
            <option value=""> Selecione </option>
            <option value="1">Solteiro</option>
            <option value="2">Casado</option>
            <option value="3">União Estável</option>
            <option value="4">Separado</option>
            <option value="5">Viúvo</option>
            <option value="6">Divorciado</option>
            <option value="7">Outros</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <!-- Nome do Conjugue -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Nome do Cônjugue">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-md-6">
        <!-- Inscrição Rural -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-tractor"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Inscrição Rural">
          </div>
        </div>
      </div>
      <!-- Tipo de Residência  -->
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Tipo de Residência</option>
            <option value="1">Alugada</option>
            <option value="2">Cedida</option>
            <option value="3">Financiada</option>
            <option value="4">Própria</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-md-6">
        <!-- Nome do Pai -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Nome do Pai">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Telefone do Pai -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone do Pai">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-md-6">
        <!-- Nome da Mãe -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Nome da Mãe">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Telefone da Mãe -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone da Mãe">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Título de Eleitor -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Título de Eleitor">
          </div>
        </div>
      </div>
      <!-- Zona -->
      <div class="col-md-3">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Zona">
          </div>
        </div>
      </div>
      <!-- Seção -->
      <div class="col-md-3">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Seção">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Data Cadastro -->
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Data Cadastro">
          </div>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Foto -->
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <div class="form-group">
          <label for="foto">Foto</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="foto">
              <label class="custom-file-label" for="foto">Escolher Arquivo</label>
            </div>
          </div>
        </div>
        <?php
        $tamanho = explode('M', ini_get('upload_max_filesize'));
        $tamanho = $tamanho[0];
        ?>
        <span><strong>O arquivo não pode ser maior que:</strong>
          <?php echo $tamanho . 'MB'; ?>
        </span>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Dados de Contato  -->
    <label>Contato</label>
    <div class="form-row align-items-center">
      <!-- Telefone -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone *">
          </div>
        </div>
      </div>
      <!-- Celular -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Celular">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Fax -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Fax">
          </div>
        </div>
      </div>
      <!-- E-mail -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="E-mail">
          </div>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Endereço  -->
    <label>Endereço</label>
    <div class="form-row align-items-center">
      <!-- CEP -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Cep">
          </div>
        </div>
      </div>
      <!-- Tipo de Endereço -->
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Tipo de Endereço</option>
            <option value="1">RUA</option>
            <option value="2">AEROPORTO</option>
            <option value="3">ALAMEDA</option>
            <option value="5">AVENIDA</option>
            <option value="10">CONJUNTO</option>
            <option value="11">DISTRITO</option>
            <option value="15">FAZENDA</option>
            <option value="17">JARDIM</option>
            <option value="18">LADEIRA</option>
            <option value="19">LAGO</option>
            <option value="21">LOTEAMENTO</option>
            <option value="24">PARQUE</option>
            <option value="25">PASSARELA</option>
            <option value="26">PATIO</option>
            <option value="27">PRACA</option>
            <option value="28">QUADRA</option>
            <option value="29">RECANTO</option>
            <option value="31">RODOVIA</option>
            <option value="34">TRAVESSA</option>
            <option value="36">TREVO</option>
            <option value="39">VIA</option>
            <option value="40">VIADUTO</option>
            <option value="41">VIELA</option>
            <option value="42">VILA</option>
            <option value="43">RUA</option>
            <option value="44">BECO</option>
            <option value="45">GALERIA</option>
            <option value="46">ESTRADA</option>
            <option value="47">PARQUE</option>
            <option value="48">PONTE</option>
            <option value="50">LARGO</option>
            <option value="51">PASSAGEM</option>
            <option value="52">VIA DE PEDESTRE</option>
            <option value="53">TRAVESSA PARTICULAR</option>
            <option value="54">VEREDA</option>
            <option value="55">ESTRADA</option>
            <option value="56">RUA DE LIGACAO</option>
            <option value="57">RUA PARTICULAR</option>
            <option value="58">VEL</option>
            <option value="59">VILA</option>
            <option value="60">CAMINHO</option>
            <option value="61">ESTRADA VELHA</option>
            <option value="62">TRAVESSA</option>
            <option value="63">PRACA</option>
            <option value="64">RODOVIA</option>
            <option value="65">TERMINAL</option>
            <option value="66">POVOADO</option>
            <option value="67">LADEIRA</option>
            <option value="4">AREA</option>
            <option value="6">CAMPO</option>
            <option value="7">CHACARA</option>
            <option value="8">COLONIA</option>
            <option value="9">CONDOMINIO</option>
            <option value="12">ESPLANADA</option>
            <option value="13">ESTACAO</option>
            <option value="14">FAVELA</option>
            <option value="16">FEIRA</option>
            <option value="20">LAGOA</option>
            <option value="22">MORRO</option>
            <option value="23">NUCLEO</option>
            <option value="30">RESIDENCIAL</option>
            <option value="32">SETOR</option>
            <option value="33">SITIO</option>
            <option value="35">TRECHO</option>
            <option value="37">VALE</option>
            <option value="38">VENEDA</option>
            <option value="68">ZONA RURAL</option>
            <option value="69">SETOR</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-md-8">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Endereço">
          </div>
        </div>
      </div>
      <!-- Número -->
      <div class="col-md-2">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Número">
          </div>
        </div>
      </div>
      <!-- Complemento -->
      <div class="col-md-2">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Complemento">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Bairro  -->
      <div class="col-md-5">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Bairro">
          </div>
        </div>
      </div>
      <!-- Cidade -->
      <div class="col-md-5">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Cidade">
          </div>
        </div>
      </div>
      <!-- Estado -->
      <div class="col-md-2">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Estado</option>
            <option value=""> Selecione </option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
            <option value="EX">EX</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- País -->
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="País">
          </div>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Referência  -->
    <label>Referência</label>
    <div class="form-row align-items-center">
      <!-- Referência Comercial -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Referência Comercial">
          </div>
        </div>
      </div>
      <!-- Telefone Referência Comercial -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone Ref. Comercial">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Referência Pessoal -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Referência Pessoal">
          </div>
        </div>
      </div>
      <!-- Telefone Referência Pessoal -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone Ref. Pessoal">
          </div>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Trabalho  -->
    <label>Trabalho</label>
    <div class="form-row align-items-center">
      <!-- Empresa Onde Trabalha -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Empresa Onde Trabalha">
          </div>
        </div>
      </div>
      <!-- Cargo -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Cargo">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Renda Média -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Renda Média">
          </div>
        </div>
      </div>
      <!-- Telefone Empresa -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Telefone Empresa">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Endereço Empresa -->
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Endereço Empresa">
          </div>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Vincular à PETS, equipamentos e etc  -->
    <label>Vincular à (Pets, Equipamentos, etc)</label>
    <div id="vincularCliente">
      <div class="form-row align-items-center">
        <!-- Vincular à -->
        <div class="col-md-11">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-plus"></i></span>
              </div>
              <input type="text" class="form-control form-required" placeholder="Vincular à">
            </div>
          </div>
        </div>
        <div class="col-md-1">
          <a id="adicionaVincular" data-url="<?= ENDERECO; ?>/view/cliente/divVincular.php" class="btn btn-block btn-success mb-3 text-white"><i class="fas fa-plus"></i></a>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Vincular à Veículos  -->
    <div class="title-line d-flex align-items-center mb-3">
      <label class="mb-0">Vincular à Veículo</label>
      <a id="adicionaVeiculo" data-url="<?= ENDERECO; ?>/view/cliente/divVincularVeiculo.php" class="btn-sm btn-block btn-success ml-3 text-white text-center w-5"><i class="fas fa-plus"></i></a>
    </div>
    <div id="vincularVeiculos">
      <!-- Divs Veículos        -->
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Vendedor/Atendente  -->
    <label>Vendedor/Atendente</label>
    <div class="form-row align-items-center">
      <!-- Vendedor -->
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Selecione: </option>
            <option value="308119">PEDRO </option>
            <option value="308558">Funcionario MASTER </option>
            <option value="309199">JOAO VITOR FUNCIONARIO </option>
            <option value="309523">FUNCIONARIO ELGIN </option>
          </select>
        </div>
      </div>
    </div>
    <!-- Divisor  -->
    <hr>
    <!-- Informações Adicionais  -->
    <label>Informações Adicionais</label>
    <div class="form-row align-items-center">
      <!-- Informações Adicionais -->
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control" placeholder="Observações"></textarea>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Limite de Crédito -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control form-required" placeholder="Limite de Crédito">
          </div>
        </div>
      </div>
      <!-- Limite de Crédito -->
      <div class="col-md-6">
        <div class="form-group">
          Boleto/ Crediário/ Nota Promissória / Cheques / Carnê
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <!-- Tipo de Compras -->
      <div class="col-md-6">
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;">
            <option disabled selected>Tipo de Compra: </option>
            <option value="V">Varejo</option>
            <option value="A">Atacado</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row align-items-center flex-row-reverse">
      <!-- Salvar  -->
      <div class="col-md-2">
        <button type="button" class="btn btn-block btn-success text-bold">Salvar &nbsp; <i class="fas fa-save"></i></button>
      </div>
      <!-- Cancelar -->
      <div class="col-md-2">
        <button type="button" class="btn btn-block btn-danger text-bold">Cancelar</button> </div>
    </div>


  </form>


</div>
<!-- /.card-body -->

<!-- Fechamento do card e da section  -->
<?php include 'layout/card-footer.php'; ?>