<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Jobs\RabbitMQJob;
use App\ResponseApi\ResponseApi;
use App\ResponseApi\ResponseApiDev;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    const TIMEEXPIRED = 300; # notificar a cada 5 minutos

    use HandlerExceptionCritical;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \App\Exceptions\ApiWebControlException::class,
        \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if(!$this->shouldReport($exception)) {
            return;
        }
        
        //envia para a fila de erros apenas para producao
        if (env('APP_ENV') == "production") {
            
            #trait HandlerExceptionCritical
            if($this->isCritical($exception)) {
                parent::report($exception);
                return;         
            }

            RabbitMQJob::dispatch([
                "queue"      => "erros",
                "connection" => "rabbitmq",
                "job"        => "App\Jobs\SendEmailErrorsJob",
                "data"       => $this->getArrayException($exception),
            ])->onConnection("rabbitmq")->onQueue("geral");
        }
         
        parent::report($exception);
    }

    private function getArrayException(Throwable $exception)
    {
        return  [
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
        ];
    }

    /**
     * Render an exception into an HTTP response.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (env('APP_ENV') == "production")
            $response = $this->tratarExceptionProd($exception);
        else
            $response = new ResponseApiDev($exception);

        return response()->json($response);
    }

    //Controla apenas o formato da resposta padrao, o envio do email é automatico pelo metodo report
    private function tratarExceptionProd(Throwable $exception)
    {
        if ($exception instanceof ApiWebControlException) {
            $className = "App\Exceptions\ApiWebControlException";
        } else {
            $className = get_class($exception);
        }

        switch ($className) {
            case 'App\Exceptions\ApiWebControlException':

                $response = new ResponseApi("", $exception->getMessage(), $exception->getCode());
                break;
            case 'Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException': #verbo HTTP invalido passado a rota
                $response = new ResponseApi("", "Verbo HTTP inválido, deve ser utilizado apenas os verbos GET, POST, PUT ou DELETE", "405");
                break;
            case 'Illuminate\Database\Eloquent\ModelNotFoundException': #Erro de binding de busca de objeto diretemente pela injecao de dependencia
                $response = new ResponseApi("", "Item não encontrado", "404");
                break;
            case 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException': #rota nao encontrada
                $response = new ResponseApi("", "NotFound", "404");
                break;
            default:
                $response = new ResponseApi("", "Ocorreu um erro inesperado, nossa equipe já foi notificada.", "500");
                break;
        }

        return $response;
    }
}
