
@extends('layouts.mackartHeader')
@section('content')

@if(Session::has('msg_error'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        <strong>Erro!</strong>
        {{Session::get('msg_error')}}
        <br>
    </div>
    @endif
    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" >Criar uma acao</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/acao/inserir') }}" enctype="multipart/form-data">
            <!--Campo nome da acao -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome_acao" value="{{ old('nome_acao') }}">
                            </div>
                        </div>
                <!--campo de descricao-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descricao</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="descricao" value="{{ old('descricao') }}"></textarea>
                            </div>
                        </div>
            <!--Foto da acao-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Foto de exibicao</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagem" value="{{ old('imagem') }}">
                            </div>
                        </div>
            <!--Quantidade de Rifas-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantidade de rifas</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantidade_rifas" value="{{ old('quantidade') }}">

                            </div>
                        </div>
            <!--Valor das Rifas-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Valor das rifas</label>

                            <div class="col-md-6">
                                <input type="number" step="any" class="form-control" name="valor_rifa">
                            </div>
                        </div>

              <!--qtd max de Rifas por comprador-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantidade máxima de rifas por comprador</label>

                              <div class="col-md-6">
                                  <input type="number" class="form-control" name="qtd_max">
                                  </div>
                          </div>


            <!--Data do sorteio-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data do Sorteio</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="data_sorteio">
                            </div>
                        </div>
            <!--Forma de Entrega-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Forma de entrega</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="forma_entrega">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <button type="button" class="btn btn-primary" onclick="location.href = '/perfil'">
                                  <i class="fa fa-btn fa-user"></i>Voltar
                              </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Criar!
                                </button>

                            </div>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>

@endsection
