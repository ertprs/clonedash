<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        #DEV
        \App\Console\Commands\Dev\RepositoryInterfaceMakeCommand::class,
        \App\Console\Commands\Dev\RepositoryEloquentMakeCommand::class,
        \App\Console\Commands\Dev\RepositoryServiceInterfaceMakeCommand::class,
        \App\Console\Commands\Dev\RepositoryServiceEloquentMakeCommand::class,
        #CRON
        \App\Console\Commands\Cron\Whatsapp\AtualizarCampanhasPendentes::class,
        \App\Console\Commands\Cron\Whatsapp\AtualizarStatusPhonesCampanha::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        //cricao dos comandos deve ser via dashboard do codestudiohq/laravel-totem
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
