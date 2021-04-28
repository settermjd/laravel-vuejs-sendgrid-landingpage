<?php

namespace App\Mail;

use Illuminate\{Bus\Queueable,Mail\Mailable,Queue\SerializesModels};
use Sichikawa\LaravelSendgridDriver\SendGrid;

class Subscribed extends Mailable
{
    use Queueable, SerializesModels;
    use SendGrid;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('email.subscribed')
            ->subject('Thanks for subscribing')
            ->sendgrid(null);
    }
}
