<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemandRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $demand;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demand)
    {
        $this->demand = $demand;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.demand.rejected');
    }
}
