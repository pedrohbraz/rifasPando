@extends('layouts.mackart')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Carrinho de rifas</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
            <!--Campo nome da acao -->
                        <h3>Rifa - TV 40 polegadas</h3>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantidade</label>
                            <p>Preco por unidade: R$7,50</p>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantidade" value="1">
                            </div>
                        </div>
                
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Checkout!
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
