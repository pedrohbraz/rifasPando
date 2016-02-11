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
                            <h6>Criador:{{$acao->user->name }}</h6>
                            <h6>Valor das rifas: R${{$acao->valor_rifa}},00</h6>
                            <h6>Descrição:  <textarea rows="4" cols="50">{{$acao->descricao}}</textarea></6>
                          <h6>  Numero sorteado: {{ $acao->numrifado or 'ainda não ocorreu sorteio' }}</h6>

                      </div>
                  </div>

                  <!-- Lista de Rifas -->

                  <div class="panel-body">
                    <div class="row" style="height: 300px; overflow-y: scroll;">
                        <form action="{{route('carrinho',$acao->id)}}" method="post">
                            <B>Rifas Disponiveis:</B><br>
                            <div class="table-responsive">
                                <table class="table" >
                                        <tbody>
                                        <tr>
                                            @foreach($acao->rifa as $key=>$rifa)
                                                @if($key%10==0 && $key != 0)
                                                    </tr>
                                                    <tr>
                                                @endif
                                                <td><input type=checkbox value = "{{$rifa->nome_rifa}}" name = "checkbox[]">{{$rifa->nome_rifa}}</td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                            <div class="form-group">

                                <input type="submit" value="Comprar!">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>
                        </form>
                    </div>

                    <!--Formulario de insercao de mensagens -->

                    <div class="row">
                      <h3>Comentarios</h3>
                      <form method="post">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="mensagem">Digite seu comentario aqui!</textarea>
                          <input type="hidden" name="acao_id" value="{{$acao->id}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
