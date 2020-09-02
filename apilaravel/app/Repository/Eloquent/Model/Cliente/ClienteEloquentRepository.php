<?php

namespace App\Repository\Eloquent\Model\Cliente;

use App\Model\Cliente\Cliente;
use Illuminate\Support\Facades\DB;
use App\DTO\Relatorios\RelatorioClienteDTO;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ClienteEloquentRepository extends WebControlEloquentRepository implements ClienteRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Cliente $model
     */
    public function __construct(Cliente $model)
    {
        parent::__construct($model);
    }

    public function getCliente(int $idCliente)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->select('c.*')
            ->whereRaw("id = ?", [$idCliente])
            ->first();
    }

    public function getClientes()
    {

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->where([
                ['c.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['c.nome', '<>', '']
            ])
            //->join('cadastro','cadastro.codloja','c.id_cadastro')
            ->orderBy('c.nome', 'asc')
            ->get(['c.id', 'nome', 'cnpj_cpf', 'telefone', 'razao_social',/*'cadastro.insc'*/]);
    }

    public function pesquisarClientesPeloNome(string $nomeCliente)
    {
        $idCadastro = $this->_usuarioLogadoService->getIdCadastroLogado();

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->where([
                ['c.id_cadastro', $idCadastro],
                ['c.nome', 'like', "%{$nomeCliente}%"]
            ])
            ->orWhere([
                ['c.id_cadastro', $idCadastro],
                ['c.cnpj_cpf', 'like', "%{$nomeCliente}%"]
            ])
            //->join('cadastro','cadastro.codloja','c.id_cadastro')
            ->orderBy('c.nome', 'asc')
            ->get(['c.id', 'nome', 'cnpj_cpf', 'telefone', 'razao_social',/*'cadastro.insc'*/]);
    }

    public function relatorioClientes(RelatorioClienteDTO $relatorioClienteDTO)
    {
        $clientes = DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente")
            ->where(['id_cadastro' => $this->_usuarioLogadoService->getIdCadastroLogado()]);

        $between[0] = $relatorioClienteDTO->getDataInicial();
        $between[1] = $relatorioClienteDTO->getDataFinal();

        $clientes->whereBetween('data_cadastro', $between);

        if (!empty($relatorioClienteDTO->getTipoPessoa()) && $relatorioClienteDTO->getTipoPessoa() != "A") {
            $clientes->where('tipo_pessoa', $relatorioClienteDTO->getTipoPessoa());
        }

        if (!empty($relatorioClienteDTO->getIptUf())) {
            $clientes->where('uf', 'like', $relatorioClienteDTO->getIptUf());
        }

        if (!empty($relatorioClienteDTO->getCidade()) && $relatorioClienteDTO->getCidade() != "T") {
            $clientes->where('cidade', 'like', $relatorioClienteDTO->getCidade());
        }

        if (!empty($relatorioClienteDTO->getSituacao()) && $relatorioClienteDTO->getSituacao() != "T") {
            $clientes->where('ativo', $relatorioClienteDTO->getSituacao());
        }

        if (!empty($relatorioClienteDTO->getBairro()) && $relatorioClienteDTO->getBairro() != "T") {
            $clientes->where('bairro', 'like', $relatorioClienteDTO->getBairro());
        }
        $clientes->orderBy('nome');

        return $clientes->get();
    }

    public function getClienteBalcao()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente")
            ->where('nome', 'LIKE', '%CLIENTE BALCAO%')
            ->where(['tipo_pessoa' => 'B', 'id_cadastro' => $this->_usuarioLogadoService->getIdCadastroLogado()])
            ->first();
    }

    public function getClientesCadastrosNoDia()
    {
        $sql = "SELECT COUNT(*) as total FROM base_web_control.cliente where  id_cadastro = ? AND LEFT(data_cadastro, 10) = ? ";
        return DB::connection($this->model->getConnectionName())->select($sql, [$this->_usuarioLogadoService->getIdCadastroLogado(), date("Y-m-d")]);
    }
}
