<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Payment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaksi)
    {
        $this->data = $transaksi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('signageAdmin@email.com')
            ->subject('Order Payment')
            ->markdown('mails.confirmation')
            ->with([
                'nama'     => $this->data->user['nama'],
                'email'    => $this->data->user['email'],
                'paket'     => $this->data->paket['nama'],
                'total'     => $this->data['total'],
            ]);
    }
}
