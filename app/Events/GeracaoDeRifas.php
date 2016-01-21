<?php

namespace App\Events;

use App\Acao;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GeracaoDeRifas extends Event
{
    use SerializesModels;

    private $acao;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Acao $acao)
    {
        $this->acao = $acao;
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

    public function getAcao()
    {
        return $this->acao;
    }
}
