<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $user)
    {
        $this->user =$user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirm-email')->with(['order' => $this->order, 'user' => $this->user]);
    }
}
