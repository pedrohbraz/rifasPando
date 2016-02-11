@extends('layouts.mackart')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Status do Pagamento
                </div>
                <div class="panel-body">
                    <h3>{{$status}}</h3>
                    <a style="float: right" href="/acao"><button type="button" class="btn btn-default" >Voltar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection