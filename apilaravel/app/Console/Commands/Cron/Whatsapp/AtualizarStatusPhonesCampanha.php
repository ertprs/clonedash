<?php

namespace App\Console\Commands\Cron\Whatsapp;

use Illuminate\Console\Command;
use App\Services\Utils\Bulkservices;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\InputArgument;
use App\Services\Repository\Contracts\Model\Whatsapp\WhatsappTransacaoRepositoryServiceInterface;

class AtualizarStatusPhonesCampanha extends Command
{
    const BULKSERVICES_TIMEOUT = 30;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:atualizar-status-phones-campanha {idTransmissao}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para realizar a comunicacao com o servico de detalhes da campanha da messageflow para obter os status de envio de cada telefone da lista da campanha';

    /**
     * @var WhatsappTransacaoRepositoryServiceInterface
     */
    private $_whatsappTransacaoRepositoryService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WhatsappTransacaoRepositoryServiceInterface $whatsappTransacaoRepositoryService)
    {
        $this->_whatsappTransacaoRepositoryService = $whatsappTransacaoRepositoryService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $idTransmissao = $this->argument('idTransmissao');
        $token         = env('TOKEN_MESSAGEFLOW');

        $response = Http::timeout(self::BULKSERVICES_TIMEOUT)->withToken($token, 'Token')->get(
            sprintf('http://api.messageflow.com.br/api/v2/campaign/%s/status/detail', $idTransmissao)
        );

        $response = $response['recipients'];
        $response = array_column($response, "status", "phone");
        
        foreach ($response as $phone => $status) {
            $this->_whatsappTransacaoRepositoryService->atualizarStatusPhoneCampanha($idTransmissao, $phone, Bulkservices::getStatus($status));
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
            ['idTransmissao', InputArgument::REQUIRED, 'O id da transmissao da campanha junto a messageflow é obrigatório.'],
        ];
    }
}
