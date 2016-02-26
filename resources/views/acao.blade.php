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
                            <h6>Criador:{{$acao->name }}</h6>
                            <span data-hint=" {{$acao->user->name}} "
                            class="hint--top hint--info">
                            <img src="{{$acao->user->foto}}/100"></span>
                            <h6>Valor das rifas: R${{$acao->valor_rifa}}</h6>
                            <h6 id="qtd_max" data-qtdmax="{{$acao->qtd_max}}">Quantidade maxima: {{$acao->qtd_max}}</h6>
                            <h6>Data do sorteio:<?php echo date("d/m/Y", strtotime($acao->data_sorteio)); ?></h6>
                            <h6>Email de contato: {{$acao->email}}</h6>
                            <h6>Telefone de contato: {{$acao->telefone_contato}}</h6>
                            <h6>Forma de entrega: {{$acao->forma_entrega}}</h6>
                            <h6>Descrição:  <textinput readonly="readonly">{{$acao->descricao}}</textinput></h6>
                          <h6>  Numero sorteado: {{ $acao->numrifado or 'ainda não ocorreu sorteio' }}</h6>

                      </div>
                  </div>

                  <!-- Lista de Rifas -->
                <div class="panel-body">
                    <form style="margin-left: -15px;
                              margin-right: -15px;"  action="{{route('carrinho',$acao->id)}}" method="post">
                        <B>Rifas Disponiveis:</B><br>
                        <div class="rifa_table_container">

                            @foreach($rifas as $rifa)

                                <input id="{{$rifa->id}}" type="checkbox" id="checkbox" value = "{{$rifa->id}}" class="vis-hidden" name = "checkbox[]" @if($rifa->user_id) checked style="color: red; !important;"@endif >
                                <label for="{{$rifa->id}}"@if($rifa->user_id)
                                      data-hint="comprador: {{$rifa->user->name}} "
                                      class="hint--top hint--info" @endif>{{$rifa->nome_rifa}} </label>
                            @endforeach

                        </div>
                        <div id="contador" data-value="0"></div>
                        <br>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </div>
                    @if(Auth::user()!=NULL)
                        <div class="form-group">
                            <button type="submit" data-toggle="tooltip" title="Limite de 3 rifas" id="botao_comprar" class="btn btn-default" >Comprar!</button>
                        </div>
                    </form>
                    @else
                        <B>Voce precisa estar logado para poder comprar.</B><br>
                        {{--<a  href="/login"><button type="button" class="btn btn-default" >Login</button></a>--}}
                        @endif


                        <!--Formulario de insercao de mensagens -->
                        @if(Auth::user()!=NULL)
                            <div class="row">
                                <form  method="post">
                                    <div   class="form-group">
                                        <h6>Comentarios</h6>
                                        <textarea class="form-control" rows="3" name="mensagem" id="texto_mensagem" placeholder="Digite seu comentario aqui!"></textarea>
                                        <input type="hidden" name="acao_id" value="{{$acao->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    </div>
                                    <div class="form-group">
                                            <button  type="submit" id="botao_mensagem" class="btn btn-default">Comentar!</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="row">
                                <form   method="post">
                                    <div style="margin-left: 15px;
                              margin-right: 15px;" class="form-group">
                                        <h6>Comentarios</h6>
                                        <textarea class="form-control" rows="3" name="mensagem" id="texto_mensagem" placeholder="Digite seu comentario aqui!"></textarea>
                                        <input type="hidden" name="acao_id" value="{{$acao->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    </div>
                                    <div style="margin-left: 15px;
                              margin-right: 15px;" class="form-group">
                                        <B>Voce precisa estar logado para poder comentar.</B><br>
                                        <a style="float: left" href="/login"><button type="button" class="btn btn-default" >Login</button></a>
                                    </div>
                                </form>
                            </div>
                        @endif
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
