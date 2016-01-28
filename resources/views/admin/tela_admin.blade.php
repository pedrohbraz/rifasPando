@extends('layouts.bootstrap_admin3.master')
@section('content')

<div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-6">
		  			@foreach($mensagens as $mensagem)
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">{{$mensagem->titulo}}</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				{{$mensagem->descricao}}
					  			
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  			@endforeach
		  		</div>
		  	</div>
@endsection
