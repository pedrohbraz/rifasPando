@extends('layouts.bootstrap_admin3.master')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Criar uma Mensagem Administrativa</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            <!--Campo nome da acao -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="titulo" value="{{ old('nome_acao') }}">
                            </div>
                        </div>
                <!--campo de descricao-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descricao</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="8" name="descricao" value="{{ old('descricao') }}"></textarea>
                            </div>
                        </div>

            <!--Data do sorteio-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data de expiracao</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="active_until">
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
@endsection