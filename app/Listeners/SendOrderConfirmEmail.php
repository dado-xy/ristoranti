<?php

namespace App\Listeners;

use App\Events\OrderConfirm;
use App\Mail\OrderConfirmMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderConfirm  $event
     * @return void
     */
    public function handle(OrderConfirm $event)
    {
        $user=User::find($event->user->id)->first();

        Mail::to($user->email)->send(new OrderConfirmMail($event->order, $user));
    }
}
