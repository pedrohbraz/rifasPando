@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Acoes e Rifas aqui!

                    <table>
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nome Acao</th>
                    <th>ID usuario</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($acaos as $acaos)
                    <tr>
                    <td>{{ $acaos->id }}</td>
                    <td>{{ $acaos->nome_acao }}</td>
                   <td>{{$acaos->id_usuario}}

                    <td></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
