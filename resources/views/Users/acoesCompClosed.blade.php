@extends('layouts.mackartHeader')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ações Fechadas</div>

                <div class="panel-body">

                    <div class="row">
                    @foreach($acaos as $acaos)

                    <div class="col-xs-6 col-md-4">
                       <div class="thumbnail">

                         <img src="{{$acaos->imagem}}/190">

                           <div class="caption">
                             <h3>{{$acaos->nome_acao}}</h3>
                             <p>R${{$acaos->valor_rifa}},00</p>
                             <p>Data do sorteio:<?php echo date("d/m/Y", strtotime($acaos->data_sorteio)); ?><p>

                           <p><b>Rifa comprada:{{$acaos->nome_rifa}}</b></p>

                         </div>
                     </div>
                   </div>
                   @endforeach
                   </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" onclick="location.href = '/perfil'">
                                <i class="fa fa-btn fa-user"></i>Voltar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
