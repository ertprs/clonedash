<?php

namespace App\Repository\Eloquent\Model\Whatsapp;

use Illuminate\Support\Facades\DB;
use App\Model\Whatsapp\WhatsappLista;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Whatsapp\WhatsappListaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class WhatsappListaEloquentRepository extends WebControlEloquentRepository implements WhatsappListaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param WhatsappLista $model
     */
    public function __construct(WhatsappLista $model)
    {
        parent::__construct($model);
    }

    public function getPeloNome(string $nomeLista)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.whatsapp_lista")
            ->where([
                ["id_cadastro", $this->_usuarioLogadoService->getIdCadastroLogado()],
                ["nome_lista", "like", "%{$nomeLista}%"]
            ])
            ->orderBy('dt_creation', 'desc')
            ->get();
    }

    public function getPeloFoneOrNomeLista(string $termoPesquisa, int $idLista)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.whatsapp_lista_telefones")
            ->where([
                ['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['id_lista', $idLista],
                ['nome', 'like', "%{$termoPesquisa}%"]
            ])->orWhere([
                ['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['id_lista', $idLista],
                ['telefone', 'like', "%{$termoPesquisa}%"]
            ])
            ->orderBy('nome', 'asc')
            ->get()
            ->toArray();
    }
}
