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
                            <p>{{$acao->user->name }}</p>
                            <p>R${{$acao->valor_rifa}},00</p>
                            <p>{{$acao->descricao}}</p>
                      </div>
                  </div>
                  <form class="form-horizontal" id = "form" role="form" method="POST" action="/acao/{{$acao->id}}/deletedReasonG">
                      {!! csrf_field() !!}

                      <div class="form-group{{ $errors->has('deleted_reason') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Motivo da deleção</label>

                          <div class="col-md-6">
                              <textarea form="form" class="form-control" name="deleted_reason" rows="7" cols="30" >{{$acao->deleted_reason}}</textarea>
                              @if ($errors->has('deleted_reason'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('deleted_reason') }}</strong>
                                  </span>
                              @endif
                       </div>
                     </div>

                     <div class="form-group">
                         <div class="col-md-6 col-md-offset-4">
                           <button type="button" class="btn btn-primary" onclick="location.href = '../{{$acao->id}}/editar'">
                               <i class="fa fa-btn fa-user"></i>Voltar
                           </button>
                             <button type="submit" class="btn btn-primary"  onclick="alert()">
                                 <i class="fa fa-btn fa-user"></i>Gravar Motivo
                             </button>
                             @if($acao->deleted_reason!=null)
                             <button type="button" class="btn btn-primary" onClick="location.href = '../{{$acao->id}}/excluir'">
                                 <i class="fa fa-btn fa-user"></i>Excluir Ação
                             </button>
                              @endif
                         </div>
                     </div>
                   </form>
            </div>

        </div>
    </div>
</div>


@endsection
