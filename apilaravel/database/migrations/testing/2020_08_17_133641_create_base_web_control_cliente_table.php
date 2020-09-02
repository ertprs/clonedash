<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseWebControlClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_web_control.cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cadastro')->nullable()->index('iddx_cliente04');
            $table->enum('tipo_pessoa', ['F', 'J', 'B', 'E'])->nullable()->comment('Fisica, Juridica, Balcão, Extrangeiro');
            $table->string('cnpj_cpf', 15)->nullable()->default('00000000000')->index('fk_cliente02');
            $table->string('rg', 20)->nullable();
            $table->string('inscricao_municipal', 19)->nullable();
            $table->string('inscricao_estadual', 14)->nullable();
            $table->string('inscricao_suframa', 14)->nullable();
            $table->string('nome', 60)->nullable();
            $table->string('razao_social', 60)->nullable();
            $table->unsignedInteger('id_tipo_log')->nullable()->default(1);
            $table->string('endereco', 50)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 55)->nullable();
            $table->string('bairro', 50)->nullable()->index('fk_bairro');
            $table->string('cidade', 50)->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('pais', 40)->nullable()->default('BRASIL');
            $table->text('informacoes_adicionais')->nullable();
            $table->timestamp('data_cadastro')->nullable()->useCurrent();
            $table->string('email', 50)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('fax', 11)->nullable();
            $table->enum('ativo', ['A', 'I', 'E'])->default('A');
            $table->decimal('renda_media', 10)->nullable();
            $table->string('empresa_trabalha', 50)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->string('fone_empresa', 11)->nullable();
            $table->string('endereco_empresa', 100)->nullable();
            $table->string('nome_referencia_comercial', 100)->nullable()->comment('Nome Referencia Comercial');
            $table->string('referencia_comercial', 11)->nullable();
            $table->string('nome_referencia', 100)->nullable();
            $table->string('referencia_pessoal', 11)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nome_pai', 50)->nullable();
            $table->string('nome_mae', 50)->nullable();
            $table->bigInteger('numero_titulo')->nullable();
            $table->string('zona', 3)->nullable();
            $table->string('secao', 4)->nullable();
            $table->longText('placa')->nullable();
            $table->string('fone_pai', 11)->nullable();
            $table->string('fone_mae', 11)->nullable();
            $table->string('socio1', 50)->nullable();
            $table->string('socio2', 50)->nullable();
            $table->string('fone_socio1', 11)->nullable();
            $table->string('fone_socio2', 11)->nullable();
            $table->integer('id_usuario')->nullable()->index('fk_id_usuario');
            $table->string('senha_ecommerce', 10)->nullable();
            $table->enum('isento_icms', ['S', 'N'])->nullable()->default('S');
            $table->integer('sincronizado')->default(0)->comment('0-Nao 1-Sim');
            $table->longText('obs')->nullable();
            $table->integer('tabela_preco')->nullable()->default(1);
            $table->integer('estado_civil')->nullable();
            $table->char('nome_conjuge', 60)->nullable();
            $table->char('tipo_residencia', 1)->nullable();
            $table->string('foto', 500)->nullable();
            $table->string('orgao_expedidor', 20)->nullable();
            $table->string('naturalidade')->nullable();
            $table->integer('id_importacao')->nullable();
            $table->integer('id_funcionario')->nullable();
            $table->decimal('limite_credito', 10)->unsigned()->nullable()->default(0.00);
            $table->decimal('limite_credito_cc', 15, 3)->default(0.000);
            $table->enum('tipo_compra', ['A', 'V'])->default('V');
            $table->integer('origem_cadastro')->nullable();
            $table->date('data_cadastro_user')->nullable();
            $table->timestamp('data_alteracao')->nullable()->useCurrent();
            $table->dateTime('data_sincronismo')->nullable();
            $table->integer('id_off')->nullable()->index('idx_id_off');
            $table->integer('substituto_tributario')->nullable()->default(0);
            $table->string('senha', 55)->nullable();
            $table->index(['id_cadastro', 'razao_social'], 'fk_cliente04');
            $table->index(['id_cadastro', 'nome'], 'fk_cliente03');
            $table->index(['id_cadastro', 'tipo_pessoa'], 'fk_cliente01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_web_control.cliente');
    }
}
