@extends('layouts.mackartHeader')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ações Fechadas</div>

                <div class="panel-body">

                    <div class="row">
                    @foreach($acao as $acao)

                    <div class="col-xs-6 col-md-3">
                        <div class="thumbnail">
                         <a href="acao/{{$acao->id}}">
                            <img src="{{$acao->imagem}}/190">
                          </a>
                          <div class="caption">
                            <h3>{{$acao->nome_acao}}</h3>
                            <p>R${{$acao->valor_rifa}},00</p>
                            <p>Sorteio:<?php echo date("d/m/Y", strtotime($acao->data_sorteio)); ?></p>
                            <p>Número sorteado:{{$acao->numrifado}}</p>
                            <p>ID ganhador:{{$acao->winner_id}}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>

                </div>
              </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary" onclick="location.href = '/perfil'">
                <i class="fa fa-btn fa-user"></i>Voltar
            </button>
        </div>
    </div>
</div>
@endsection
