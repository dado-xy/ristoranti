<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $partner_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($product, $partner_id)
    {
        $this->product=$product;
        $this->partner_id=$partner_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
