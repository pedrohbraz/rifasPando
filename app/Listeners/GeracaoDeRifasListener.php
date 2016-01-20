<?php

namespace App\Listeners;

use App\Events\GeracaoDeRifas;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Rifa;

class GeracaoDeRifasListener
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(GeracaoDeRifas $event)
    {
        $acao = $event->getAcao();
        for($i=1 ; $i<=$acao->quantidade_rifas; $i++)
        {
            $rifa = New Rifa;
            $rifa->acao_id = $acao->id;
            $rifa->nome_rifa = $i;
            $rifa->save();
        }
    }
}
