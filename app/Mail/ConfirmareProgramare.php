<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmareProgramare extends Mailable
{
    use Queueable, SerializesModels;

    public $programare;

    public function __construct($programare)
    {
        $this->programare = $programare;
    }

    public function build()
    {
        return $this->subject('Confirmare programare')
                    ->markdown('emails.confirmare-programare');
    }
}
