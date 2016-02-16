@extends('layouts.mackart')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if($mensagem)
            <div class="panel panel-primary">
                    <div class="panel-heading">Mensagens</div>
                    <div class="panel-body">{{$mensagem->user->name}}:  {{$mensagem->descricao}}</div>
            </div>
            @endif
            <div class="panel panel-info">
                <div class="panel-heading">Rifas disponiveis</div>

                <div class="panel-body">
                    <div class="row">
                        @foreach($acaos as $acao)
                            <div class="col-xs-6 col-md-3">
                                <div class="thumbnail">
                                    <a href="acao/{{$acao->id}}">
                                        <img src="{{$acao->imagem }}/190">
                                    </a>
                                    <div class="caption">
                                        <h3 style="word-wrap:break-word">{{$acao->nome_acao}}</h3>
                                        <p>R${{$acao->valor_rifa }},00</p>
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
