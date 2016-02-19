@extends('layouts.mackart')
@section('content')
<script>
    @if($aux==1)
    swal({   title: "{{$status}}",   text: "", type: "success",   timer: 3000,   showConfirmButton: false });
    @else    swal({   title: "{{$status}}",   text: "",   timer: 3000,   showConfirmButton: false });
    @endif
</script>


<div class="container">
    <div class="row">
        <a style="float:left" href="/acao"><button type="button" class="btn btn-default" >Voltar</button></a>
    </div>
</div>

@endsection