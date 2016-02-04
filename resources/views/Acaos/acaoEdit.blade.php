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
                      <div class="col-xs-6 col-md-4">
                        <h3>{{$acao->nome_acao}}</h3>
                        <h6>Criador:{{$acao->user->name }}</h6>
                        <h6>Valor das rifas: R${{$acao->valor_rifa}},00</h6>
                        <h6>Descrição:  <textarea rows="4" cols="50">{{$acao->descricao}}</textarea></6>
                      <h6>  Numero sorteado: {{ $acao->numrifado or 'ainda não ocorreu sorteio' }}</h6>
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
