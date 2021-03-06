<?php

namespace App\Mail;

use App\PesanCostumer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invoices extends Mailable
{
    use Queueable, SerializesModels;

    public $form_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PesanCostumer $form_data)
    {
        $this->form_data = $form_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invoices')
            ->with([
                'link' => 'pesanpaket/info/'. $this->form_data->id,
            ]);
    }
}
