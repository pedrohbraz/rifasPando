@extends('layouts.mackart')
@section('content')
    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif
<div class="container">
    <div class="row">
        <a style="float:left" href="/acao"><button type="button" class="btn btn-default" >Voltar</button></a>
    </div>
</div>
@endsection