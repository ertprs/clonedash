<?php

namespace App\Exceptions;

use Throwable;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\QueryException;
use PhpAmqpLib\Exception\AMQPExceptionInterface;

/**
 * @author Tiago Franco
 * handler  especifico para trabalhar com as 
 * excecoes criticas do sistema
 */
trait HandlerExceptionCritical
{
    /**
     * @param Throwable $throwable
     */
    public function isCritical(Throwable $throwable)
    {
        if ($throwable instanceof \RedisException) {
            $this->notificar("ERRO REDIS " . $throwable->getMessage());
            return true;
        }

        if ($throwable instanceof QueryException) {

            if (preg_match("/SQLSTATE\[HY000\]/", $throwable->getMessage())) {
                $this->notificar("ERRO DATABASE " . $throwable->getMessage());
                return true;
            }
        }

        if ($throwable instanceof AMQPExceptionInterface) {
            $this->notificar("ERRO RABBITMQ " . $throwable->getMessage());
            return true;
        }

        if ($throwable instanceof AlertaException) {
            $this->notificar("ATENÇÂO " . $throwable->getMessage(), $throwable->getNivel());
            return true;
        }

        return false;
    }

    private function notificar(string $message, string $nivel = 'emergency')
    {
        try {
            #tempo de envio de nova notificacao ainda nao inspirou
            if (Cache::store('redis')->get(md5($message))) {
                return;
            }

            #incluir no cache do redis com tempo de expiracao
            Cache::store('redis')->put(md5($message), $message, Handler::TIMEEXPIRED);
            Log::$nivel($message);

        } catch (\RedisException $th) {
            //Erro server redis, tratar cache em arquivo local
            $this->tratarCacheSemRedis($message, $nivel);
        }
        
    }

    private function tratarCacheSemRedis(string $message, string $nivel = 'emergency')
    {
        #tempo de envio de nova notificacao ainda nao inspirou
        if (Cache::store('file')->get(md5($message))) {
            return;
        }

        #incluir em arquivo cache caso server redis esteja off e com tempo de expiracao
        Cache::store('file')->put(md5($message), $message, Handler::TIMEEXPIRED); 
        Log::$nivel("ERRO REDIS " . $message);
    }
}
