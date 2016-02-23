@extends('layouts.mackart')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-info">
                <div class="panel-heading">Rifas Finalizadas</div>

                <div class="panel-body">
                    <div class="row">
                        @foreach($acaos as $acao)
                            <div class="col-xs-6 col-md-3">
                                <div class="thumbnail">
                                  <img src="{{$acao->imagem }}/190">
                                    </a>
                                    <div class="caption">
                                      <h3>{{$acao->nome_acao}}</h3>
                                      <p>R${{$acao->valor_rifa}},00</p>
                                      <p>Sorteio:<?php echo date("d/m/Y", strtotime($acao->data_sorteio)); ?></p>
                                      <p>Número sorteado:{{$acao->numrifado}}</p>
                                      @foreach($ganhadores as $ganhador)
                                      @if($ganhador->id ==$acao->winner_id)
                                      <p>Ganhador:{{$ganhador->name}}</p>@endif
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
