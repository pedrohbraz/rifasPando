<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Template / Theme - Flathood</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="perfilUser/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="perfilUser/css/styles.css" rel="stylesheet">
	</head>
	<body>



<!-- Begin Body -->
<div class="container">
	<div class="row">
  			<div class="col col-sm-3">
              	<div id="sidebar">
      			<ul class="nav nav-stacked">
                    <li><h3 class="highlight">Perfil <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                  	<li><a href="/perfil/{{ Auth::user()->id }}/editar">Atualizar Perfil</a></li>
				    </ul>
            <ul class="nav nav-stacked">
                    <li><h3 class="highlight">Ações organizadas <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                    <li><a href="acao/inserir">Criar Ação</a></li>
                    <li><a href="/acao/{{ Auth::user()->id }}/organizadas/andamento/exibir">Ações em andamento</a></li>
                    <li><a href="/acao/{{ Auth::user()->id }}/organizadas/fechadas/exibir">Ações fechadas</a></li>
				    </ul>

          </ul>
          <ul class="nav nav-stacked">
                  <li><h3 class="highlight">Ações Compradas <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                  <li><a href="/acao/{{ Auth::user()->id }}/compradas/andamento/exibir">Ações em andamento</a></li>
                  <li><a href="/acao/{{ Auth::user()->id }}/compradas/fechadas/exibir">Ações fechadas</a></li>
          </ul>
               </div>
      		</div>
      		<div class="col col-sm-9">
              <div class="panel">
              <h1>Bem Vindo {{Auth::user()->name}}</h1>

              <div class="row">

              	<div class="col col-sm-4">
                  <img src="" class="img-responsive">
                </div>
								@if(Auth::user()->foto!=null)
        		     <div class="col col-sm-4">
                  <img src="{{Auth::user()->foto}}/190" class="img-responsive">

              	</div>
                @else
								<div class="col col-sm-4">
								 <img src="/image/users/userPadrao/190" class="img-responsive">
							 </div>
							 @endif


              </div>

              	<h2>Dados Pessoais</h2>
                <label class="nome">Nome:</label>

                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly="readonly">
                    <label class="nome">Email:</label>

                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly="readonly">
                        <label class="nome">Telefone:</label>

                            <input type="text" class="form-control" name="telefone" value="{{ Auth::user()->telefone }}" readonly="readonly">
                            <label class="nome">Endereco:</label>

													 <input type="text" class="form-control" name="endereco" value="{{ Auth::user()->endereco }}" readonly="readonly">
                          <label class="nome">Email Paypal:</label>

	 														<input type="text" class="form-control" name="email_paypal" value="{{ Auth::user()->email_paypal }}" readonly="readonly">
						 	</div>
      	</div>
  	</div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
