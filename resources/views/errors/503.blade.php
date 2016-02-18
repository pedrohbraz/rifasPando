@extends('layouts.mackart')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($mensagem)
                    <div class="panel panel-primary">
                        <div class="panel-heading">Avisos</div>
                        <div class="panel-body">
                            <h6>{{$mensagem->user->name}} ({{$mensagem->created_at}}): {{$mensagem->descricao}}</h6>
                        </div>
                    </div>
                @endif
                <div class="panel panel-info">
                    <div class="panel-heading">Rifas ativas</div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($acaos as $key=>$acao)
                                <div class="panel panel-default">
                                    <div class="panel heading">
                                        <h3 style="word-wrap:break-word">{{$acao->nome_acao}}</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="{{$acao->imagem }}/190">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <h6>Criador:{{$criador[$key]->name}}</h6>
                                            <img src="{{$criador[$key]->foto}}/100">
                                            <h6>Valor das rifas: R${{$acao->valor_rifa}},00</h6>
                                            <h6>Data do sorteio:<?php echo date("d/m/Y", strtotime($acao->data_sorteio)); ?></h6>
                                            <h6>Email de contato: {{$acao->email}}</h6>
                                            <h6>Telefone de contato: {{$acao->telefone_contato}}</h6>
                                            <h6>Descrição:  <textinput readonly="readonly">{{$acao->descricao}}</textinput></h6>
                                            <h6>  Numero sorteado: {{ $acao->numrifado or 'ainda não ocorreu sorteio' }}</h6>
                                        </div>
                                        <div class="panel-body">
                                            <b>Compradores:</b>
                                        @foreach($rifas as $rifa)
                                            @if($rifa->acao_id==$acao->id)
                                                    <h6>{{$rifa->name}}</h6>
                                            @endif
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