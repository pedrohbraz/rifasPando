<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Log;
use App\Acao;
use App\Rifa;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

          $schedule->call(function () {
            $hoje = getdate();
            $hoje2 = $hoje['year'].'-'.$hoje['mon'].'-'.$hoje['mday'];

          $acoes = DB::table('acaos')
                  ->where('data_sorteio','=',$hoje2)
                  ->where('numrifado',null)
                  ->get();
                 foreach($acoes as $acoes){
                   $rifas = DB::table('rifas')
                              ->join('acaos','rifas.acao_id','=','acaos.id')
                              ->where('acao_id',$acoes->id)
                              ->whereNotNull('id_comprador') //indica que existe um comprador
                              ->where('acaos.data_sorteio','=',$hoje2)
                              ->get();
                              $sorteado =  array_rand ($rifas,1);//variavel com uma posição randomica do array
                              Log::info("teste");
                              $numero = $rifas[$sorteado];//rifa especifica do array com a posição sorteada
                              $acao = Acao::find($acoes->id);
                              $acao->numrifado = $numero->nome_rifa; //atualiza campo de numero rifado da tabele acaos

                              $acao->winner_id = $numero->id_comprador;//atualiza o campo id do vencedor em acaos
                              // Log::info($acao);
                              $acao->save();

              /*  Acao::all()->with('rifas')
                ->get();*/
            }


        })->everyTenMinutes();
    }
}
