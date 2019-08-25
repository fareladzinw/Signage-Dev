<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserActivation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $aktivasi)
    {
        $this->data['user'] = $data;
        $this->data['aktivasi'] = $aktivasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('signageAdmin@email.com')
            ->subject('Account Activation')
            ->markdown('mails.activation')
            ->with([
                'nama'     => $this->data['user']['nama'],
                'email'    => $this->data['user']['email'],
                'kode'     => $this->data['aktivasi']['kode'],
            ]);
    }
}
