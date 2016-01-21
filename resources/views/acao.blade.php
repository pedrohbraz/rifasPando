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

                  <!-- Lista de Rifas -->

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

                    <!--Formulario de insercao de mensagens -->

                    <div class="row">
                      <h3>Comentarios</h3>
                      <form method="post">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="mensagem">Digite seu comentario aqui!</textarea>
                          <input type="hidden" name="acao_id" value="{{$acao->id}}">
                          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                        <div class="form-group">
                          <input type="submit" value="Comentar!">
                        </div>
                      </form>
                    </div>

                    <!-- Mensagens sobre a acao -->

                    <div class="row">
                      @foreach($acao->mensagem as $mensagem)
                      <div class="panel panel-default">
                        <div class="panel-heading">{{$mensagem->user->name}}</div>
                        <div class="panel-body">
                          {{$mensagem->mensagem}}
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
