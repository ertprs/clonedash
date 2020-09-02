<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        ##IMPORTANTE. CERTIFICAR A EXECUCAO COM SUCESSO A LIMPEZA DO CACHE 
        ##PARA FORCAR A EXECUCAO DO BANCO DE TESTE
        $valido = false;
 
        if(preg_match("/Configuration cache cleared\!/", shell_exec("php artisan config:clear"))) {
            $valido = true;             
        }

        if(!$valido) {
            echo "CUIDADO, caches da aplicação não foram limpos para a execução dos testes!\n";
            exit;
        }
        
        putenv('DB_CONNECTION=testing');
        
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
