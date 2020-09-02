<?php

namespace App\Console\Commands\Cron\Whatsapp;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use App\Repository\Contracts\Model\Whatsapp\WhatsappCampanhaRepositoryInterface;

class AtualizarCampanhasPendentes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:atualizar-campanhas-pendentes {qtdeDias}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para obter as campanhas que contem ao menos uma transacao de telefone pendente. Responsavel por chamar o comando de atulizacao dos status
    de entregas dos telefones da campanha';

    /**
     * @var WhatsappCampanhaRepositoryInterface
     */
    private $_whatsappCampanhaRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WhatsappCampanhaRepositoryInterface $whatsappCampanhaRepository)
    {
        $this->_whatsappCampanhaRepository = $whatsappCampanhaRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $qtdeDias = $this->argument('qtdeDias');
        //obtem o lista de ids de campanhas com alguma transacao de telefone em aberto dentro 
        //dos ultimos dias pesquisados (passdo cpmo parametro e default 3)
        $idCampanhas    = $this->_whatsappCampanhaRepository->getIdCampanhasComEnvioFonePendentes($qtdeDias);
        
        if(empty($idCampanhas)) {
            echo "Não existem campanhas com entregas pendentes nos últimos $qtdeDias dias";
            die;    
        }
        //transacoes para comunicao com a api da bulkservices
        $idTransmissoes = $this->_whatsappCampanhaRepository->getIdTransmissoesCampanhas($idCampanhas);
        foreach ($idTransmissoes as $idTransmissao) {
            $this->call('whatsapp:atualizar-status-phones-campanha', [
                'idTransmissao' => $idTransmissao
            ]);
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['qtdeDias', InputArgument::REQUIRED, 'O filtro da qtde de dias da criacao da campanha é obrigatorio.'],
        ];
    }
}
