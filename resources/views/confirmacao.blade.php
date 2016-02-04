@extends('layouts.mackart')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel panel-primary">
                    <div class="panel-heading">Confirmacao de Pagamento</div>
                    <div class="panel-body">
                        <h3>Status do pagamento:{{$status}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection