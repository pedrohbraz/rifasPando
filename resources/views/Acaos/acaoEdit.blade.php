@extends('layouts.mackartHeader')

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
                      <form class="form-horizontal" role="form" method="POST" action="/acao/{{$acao->id}}/atualizar" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                      <div class="col-xs-6 col-md-4">
                        <h3>{{$acao->nome_acao}}</h3>
                        <h6>Criador:{{$acao->user->name }}</h6>
                        <img src="{{$acao->user->foto}}/100">
                        <h6>Valor das rifas: R${{$acao->valor_rifa}},00</h6>
                        <h6>Data do sorteio:<?php echo date("d/m/Y", strtotime($acao->data_sorteio)); ?></h6>
                        <h6>Email de contato: {{$acao->email}}</h6>
                        <h6>Telefone de contato: {{$acao->telefone_contato}}</h6>
                        <h6>Descrição:
                        <textarea class="form-control" rows="3" name="descricao" value="{{$acao->descricao}}">{{$acao->descricao}}</textarea>
                        </h6>
                         <h6>Numero sorteado: {{ $acao->numrifado or 'ainda não ocorreu sorteio' }}</h6>

                        <label>Alterar Imagem</label>
                        <input type="file" class="form-control" name="imagem" value="{{ old('imagem') }}"/>
                      </br>
                       <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>ok
                     </button>
                </form>

                      </div>


  </div>
                  <div class="panel-body">


                    <div class="form-group">

                        <div class="col-md-6 col-md-offset-4">

                          <button type="button" class="btn btn-primary" onclick="location.href = '/perfil'">
                              <i class="fa fa-btn fa-user"></i>Voltar
                          </button>
                            @if($acao->numrifado==null)
                            <button type="button" class="btn btn-primary" onClick="location.href = '../{{$acao->id}}/deletedReason'">
                                <i class="fa fa-btn fa-user"></i>Excluir Ação
                            </button>

                            <button type="submit" class="btn btn-primary" onclick="location.href = '../{{$acao->id}}/rifar'">
                                <i class="fa fa-btn fa-user"></i>Rifar
                            </button>

                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
