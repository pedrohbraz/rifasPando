<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SoftDeleteRifas extends Event
{
    use SerializesModels;

    private $rifas;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($rifas)
    {
        $this->rifas=explode(',',$rifas);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function getRifas()
    {
        return $this->rifas;
    }


}
