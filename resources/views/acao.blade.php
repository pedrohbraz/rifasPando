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
                            <h6>Descrição:  <textarea rows="4" cols="50" readonly="readonly">{{$acao->descricao}}</textarea></h6>
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
                                            {{--<input type="checkbox" name="wpuf_post_tags[]" class="vis-hidden new-post-tags" value="Aliens" />--}}
                                            {{--<label for="chk_aliens">Aliens</label>--}}

                                            {{--<input id="chk_ghosts" type="checkbox" name="wpuf_post_tags[]" class="vis-hidden new-post-tags" value="Ghosts" />--}}
                                            {{--<label for="chk_ghosts">Ghosts</label>--}}

                                            {{--<input id="chk_monsters" type="checkbox" name="wpuf_post_tags[]" class="vis-hidden new-post-tags" value="Monsters" />--}}
                                            {{--<label for="chk_monsters">Monsters</label>--}}

                                        @foreach($acao->rifa as $key=>$rifa)
                                                @if($key%10==0 && $key != 0)
                                                    </tr>
                                                    <tr>
                                                @endif
                                                <td><input id="{{$rifa->id}}" type="checkbox" value = "{{$rifa->id}}" class="vis-hidden new-post-tags" name = "checkbox[]" @if($rifa->id_comprador) checked style="border-color: green;"@endif >
                                                    <label for="{{$rifa->id}}">{{$rifa->nome_rifa}}</label>
                                                </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                @if(Auth::user()!=NULL)
                                    <button type="submit" class="btn btn-default" >Comprar!</button>
                                @else
                                    </div>
                                    </form>
                                    <h6>Voce precisa estar logado para poder comprar.</h6>
                                    <a href="/login"><button type="submit" class="btn btn-default" >Login</button></a>
                                @endif

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
