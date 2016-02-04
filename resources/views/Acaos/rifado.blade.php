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
                    </div>
                    <div class="col-xs-4 col-md-4">
                    <table border="1" class="table table-condensed"  style="position:absolute;right:100px; top: 120px;">
                                <tr>
                                <td><h6>Numero sorteado</h6></td>
                                <td>{{$numero->nome_rifa}}</td>
                                </tr>
                                <tr>
                                <td><h6>Ganhador</h6></td>
                                <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                <td><h6>Sorteio Realizado em</h6></td>
                                <td>{{$acao->data_sorteio}}</td>
                                </tr>
                  </table>
                </div>
                </div>


                  <div class="panel-body">
                    <div class="row" style="height: 100px;">
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button type="button" class="btn btn-primary" onclick="location.href = '/acao/{{$acao->id}}/editar'">
                              <i class="fa fa-btn fa-user"></i>Voltar

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
