@extends('layouts.mackart')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Carrinho de rifas</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/paypal2') }}" enctype="multipart/form-data">
            <!--Campo nome da acao -->
                        <h3>{{$rifa->name}}</h3>
                        <div class="form-group">
                            <p>Quantidade:{{$rifa->quantidade}}</p>
                            <p>Preco por unidade: R${{$rifa->valor}}</p>
                        </div>
                        <input type="hidden" name="name" value="{{$rifa->name}}" />
                        <input type="hidden" name="quantidade" value="{{$rifa->quantidade}}" />
                        <input type="hidden" name="valor" value="{{$rifa->valor}}" />
                        <input type="hidden" name="total" value="{{$rifa->valor * $rifa->quantidade}}" />
                       
                        <h3>Valor Total: R${{$rifa->valor * $rifa->quantidade}}</h3>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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
