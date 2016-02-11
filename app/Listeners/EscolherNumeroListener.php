<?php

namespace App\Listeners;

use App\Events\HoraSorteio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscolherNumeroListener
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
     * @param  HoraSorteio  $event
     * @return void
     */
    public function handle(HoraSorteio $event)
    {
        //
    }
}
