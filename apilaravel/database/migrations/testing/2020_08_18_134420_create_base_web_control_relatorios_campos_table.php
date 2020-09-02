<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseWebControlRelatoriosCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_campos', function (Blueprint $table) {
            $table->integer('id_campo', true);
            $table->integer('id_tabela')->nullable();
            $table->string('nome_campo', 100)->nullable();
            $table->integer('tamanho_campo');
            $table->string('nome_campo_form', 100)->nullable();
            $table->integer('tabela_forenign')->nullable();
            $table->integer('campo_forenign')->nullable();
            $table->string('categoria', 30)->nullable();
            $table->string('mascara', 50)->nullable();
            $table->integer('ordemApresentacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios_campos');
    }
}
