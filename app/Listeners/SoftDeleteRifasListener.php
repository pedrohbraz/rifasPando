<?php

namespace App\Listeners;

use App\Events\SoftDeleteRifas;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Rifa;
use Illuminate\Database\Eloquent\SoftDeletes;
class SoftDeleteRifasListener
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
     * @param  SoftDeleteRifas  $event
     * @return void
     */
    public function handle(SoftDeleteRifas $event)
    {
        $rifas = $event->getRifas();
        foreach($rifas as $rifa)
        {
           Rifa::find($rifa)->delete();
        }

    }
}
