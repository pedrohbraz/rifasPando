@extends('layouts.mackartHeader')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ações em Andamento</div>

                <div class="panel-body">

                    <div class="row">
                    @foreach($rifas as $rifas)

                     <div class="col-xs-6 col-md-4">
                        <div class="thumbnail">
                      <a href="/acao/{{$rifas->acao_id}}">
                          <img src="{{$rifas->imagem}}/190">
                      </a>
                            <div class="caption">
                              <h3>{{$rifas->nome_acao}}</h3>
                              <p>R${{$rifas->valor_rifa}}</p>
                              <p>Data do sorteio:<?php echo date("d/m/Y", strtotime($rifas->data_sorteio)); ?><p>
                              <p><b>Rifa comprada:{{$rifas->nome_rifa}}</b></p>

                          </div>
                      </div>
                    @endforeach
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" onclick="location.href = '/perfil'">
                                <i class="fa fa-btn fa-user"></i>Voltar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
