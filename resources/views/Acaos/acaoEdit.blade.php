@extends('layouts.mackart')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$acao->nome_acao}}</div>
                  <div class="row">
                      <div class="col-xs-6 col-md-4">
                        <div class="thumbnail">
                          <img src="{{$acao->imagem}}/1000">
                        </div>
                      </div>
                      <div class="col-xs-6 col-md-4">
                            <h3>{{$acao->nome_acao}}</h3>
                            <p>R${{$acao->valor_rifa}},00</p>
                            <p>{{$acao->descricao}}</p>
                      </div>
                  </div>

                  <!-- Lista de Rifas Vendidas-->

                  <div class="panel-body">
                    <div class="row" style="height: 300px; overflow-y: scroll;">
                    @foreach($acao->rifa as $rifa)

                      <div class="col-xs-6 col-md-4">
                          <div class="thumbnail">
                            <button type="button" class="btn btn-primary btn-lg">{{$rifa->nome_rifa}}</button>
                          </div>
                      </div>
                    @endforeach
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button type="button" class="btn btn-primary" onclick="location.href = '/perfil'">
                              <i class="fa fa-btn fa-user"></i>Voltar
                          </button>
                            <button type="button" class="btn btn-primary" onClick="location.href = '../{{$acao->id}}/excluir'">
                                <i class="fa fa-btn fa-user"></i>Excluir Ação
                            </button>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
