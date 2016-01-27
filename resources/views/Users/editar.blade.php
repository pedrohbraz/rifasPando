@extends('layouts.mackartHeader')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/perfil/{{Auth::user()->id}}/atualizar" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
             <!----campo de telefone-->
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telefone" value="{{ Auth::user()->telefone}}">

                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            <!-----campo de endereço-->
                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="endereco" value="{{Auth::user()->endereco}}">

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Foto do usuario-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Inserir Foto</label>

                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                                        </div>
                                    </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nova senha</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="newpassword">

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirme nova senha</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="newpassword_confirmation">

                                @if ($errors->has('newpassword_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <button type="button" class="btn btn-primary" onclick="location.href = '/perfil'">
                                  <i class="fa fa-btn fa-user"></i>Voltar
                              </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Atualizar
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
