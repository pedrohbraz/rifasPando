@extends('layouts.app2')
@section('content')
<h1 align="center"> Suas ações </h1>


<div class="row">
  @foreach($acao as $acao)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>{{ $acao->nome_acao }}</h3>
        <p>...</p>
      </div>
    </div>
  </div>
  @endforeach
</div>


@endsection
