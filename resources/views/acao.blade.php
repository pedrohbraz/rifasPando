@extends('layouts.app')

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
                  <div class="panel-body">
                    <div class="row">
                    @foreach($acao->rifa as $rifa)
                      
                      <div class="col-xs-6 col-md-4">
                          <div class="thumbnail">
                            <button type="button" class="btn btn-primary btn-lg">{{$rifa->nome_rifa}}</button>
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
