<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseWebControlWebcUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_web_control.webc_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cadastro')->nullable()->index('fk_id_cadastro');
            $table->string('nome_usuario', 40)->nullable();
            $table->string('login', 20)->nullable()->index('login');
            $table->string('senha', 20)->nullable();
            $table->timestamp('data_criacao')->nullable()->useCurrent();
            $table->enum('ativo', ['A', 'I', 'E'])->nullable()->default('A');
            $table->integer('id_funcionario')->nullable()->index('id_funcionario');
            $table->enum('login_master', ['S', 'N', 'V'])->nullable()->default('N');
            $table->string('email', 50)->nullable();
            $table->date('data_desabilita')->nullable();
            $table->decimal('percentual_desconto_autorizado', 10)->nullable();
            $table->decimal('percentual_desconto_item', 10)->nullable();
            $table->string('cnpj_cpf', 14)->nullable();
            $table->integer('id_tipo_permissao_usuario')->nullable()->default(1);
            $table->text('array_permissao')->nullable();
            $table->tinyInteger('agenda')->nullable()->default(1);
            $table->time('horario_inicio')->nullable()->default('00:00:00');
            $table->time('horario_fim')->nullable()->default('23:59:59');
            $table->dateTime('data_alteracao')->nullable();
            $table->dateTime('data_sincronismo')->nullable();
            $table->integer('id_off')->nullable();
            $table->string('dias_semana', 13)->nullable();
            $table->binary('api_key')->nullable();
            $table->unique(['login', 'senha'], 'fk_senha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_web_control.webc_usuario');
    }
}
