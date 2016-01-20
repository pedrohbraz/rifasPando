@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rifas disponiveis</div>

                <div class="panel-body">
                    <div class="row">
                    @foreach($acaos as $acao)
                    
                      <div class="col-xs-6 col-md-3">
                        <div class="thumbnail">
                          <a href="acao/{{$acao->id}}">
                            <img src="{{$acao->imagem}}/190">
                          </a>
                          <div class="caption">
                            <h3>{{$acao->nome_acao}}</h3>
                            <p>R${{$acao->valor_rifa}},00</p>
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
