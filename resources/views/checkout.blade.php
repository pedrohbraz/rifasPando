@extends('layouts.mackart')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Carrinho de rifas</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/paypal') }}" enctype="multipart/form-data">
                        <h3>Rifas:{{$rifas}}</h3>
                        <h3><p>Quantidade:{{$checkboxCount}}</p>
                        <p>Preco por unidade: R${{$acao->valor_rifa}},00</p>
                        <p>Valor Total: R${{$acao->valor_rifa * $checkboxCount}}</p>
                        <input type="hidden" name="nome" value="{{$acao->nome_acao}}">
                        <input type="hidden" name="quantidade" value="{{$checkboxCount}}">
                        <input type="hidden" name="valor" value="{{$acao->valor_rifa}}">
                        <input type="hidden" name="total" value="{{$acao->valor_rifa * $checkboxCount}}">
                        <input type="hidden" name="rifas" value="{{$acao->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" /></h3>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Pagar no PayPal!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
