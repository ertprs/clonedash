<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Throwable;

class EnviarEmailsErros extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Throwable
     */
    private $exception;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to("tiago.ffx@gmail.com", "Tiago Franco")
        ->subject("Laravel Test Mail")
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        return $this->view('email.erros', ["exception" => $this->exception]);
    }
}
