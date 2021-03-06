<!DOCTYPE html>
<html lang="en">
	<head>

		<script>
		function alert() {
		  alert("O motivo da exclusão foi gravado com sucesso, você pode alterar o motivo e clicar novamente em gravar, caso apague o conteudo do campo,voce gravará a ultima mensagem submetida");
		}
		</script>

		<meta charset="utf-8">
		<!-- Title here -->
		<title>MacKart</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<link rel="stylesheet" href="../../../../hint/hint.css">
		<!-- Bootstrap CSS -->
		<link href="../../../../css/mackart/bootstrap.min.css" rel="stylesheet">
		<!-- Flex slider -->
		<link href="../../../../css/mackart/flexslider.css" rel="stylesheet">
		<link href="../../../../css/mackart/owl.carousel.css" rel="stylesheet">
		<link href="../../../../css/mackart/font-awesome.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="../../../../css/mackart/style.css" rel="stylesheet">
		<!-- Stylesheet for Color -->
		<link href="../../../../css/mackart/red.css" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images-mackart/favicon/favicon.png">
		<script src="/assets/sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="/assets/sweetalert-master/dist/sweetalert.css">
	</head>

	<body>

	<!-- Cart, Login and Register form (Modal) -->
		<!-- Cart Modal starts -->
		<div id="cart" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Shopping Cart</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped tcart">
							<thead>
								<tr>
								  <th>Name</th>
								  <th>Quantity</th>
								  <th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								  <td><a href="single-item.html">HTC One</a></td>
								  <td>2</td>
								  <td>$250</td>
								</tr>
								<tr>
								  <td><a href="single-item.html">Apple iPhone</a></td>
								  <td>1</td>
								  <td>$502</td>
								</tr>
								<tr>
								  <td><a href="single-item.html">Galaxy Note</a></td>
								  <td>4</td>
								  <td>$1303</td>
								</tr>
								<tr>
								  <th></th>
								  <th>Total</th>
								  <th>$2405</th>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<a href="index.html" class="btn">Continue Shopping</a>
						<a href="checkout.html" class="btn btn-danger">Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!--/ Cart modal ends -->

		<!-- Login Modal starts -->
		<div id="login" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Login</h4>
					</div>
					<div class="modal-body">
						<div class="form">
							<form class="form-horizontal">
							  <div class="form-group">
								<label class="control-label col-md-3" for="username">Username</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" id="username">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="email">Password</label>
								<div class="col-md-7">
								  <input type="password" class="form-control" id="password">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-md-7 col-md-offset-3">
								 <div class="checkbox inline">
									<label>
									   <input type="checkbox" id="inlineCheckbox1" value="agree"> Remember Password
									</label>
								 </div>
								 </div>
							  </div>

							  <div class="form-group">
							  <div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-default">Login</button>
								<button type="reset" class="btn btn-default">Reset</button>
							  </div>
							  </div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<p>Dont have account? <a href="register.html">Register</a> here.</p>
					</div>
				</div>
			</div>
		</div>
		<!--/ Login modal ends -->

		<!-- Register Modal starts -->
		<div id="register" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Register</h4>
					</div>
					<div class="modal-body">
						<div class="form">
							<form class="form-horizontal">
							  <div class="form-group">
								<label class="control-label col-md-3" for="name">Name</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" id="name">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="email">Email</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" id="email">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3">Drop Down</label>
								<div class="col-md-7">
									<select class="form-control">
									<option>&nbsp;</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="username1">Username</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" id="username1">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="password1">Password</label>
								<div class="col-md-7">
								  <input type="password" class="form-control" id="password1">
								</div>
							  </div>
							  <div class="form-group">
							  <div class="col-md-7 col-md-offset-3">
								 <div class="checkbox inline">
									<label>
									   <input type="checkbox" id="inlineCheckbox2" value="agree"> Agree with Terms and Conditions
									</label>
								 </div>
								</div>
							  </div>

							  <div class="form-group">
								<div class="col-md-9 col-md-offset-3">
								<button type="submit" class="btn btn-default">Register</button>
								<button type="reset" class="btn btn-default">Reset</button>
								</div>
							  </div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<p>Already have account? <a href="login.html">Login</a> here.</p>
					</div>
				</div>
			</div>
		</div>
		<!--/ Register modal ends -->

		<!-- Header starts -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<!-- Logo. Use class "color" to add color to the text. -->
						<div class="logo">
							<h1><a href="#">Mac<span class="color bold">Kart</span></a></h1>
							<p class="meta">online shopping is fun!!!</p>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-4">

						<!-- Search form -->
						<form role="form">
							<div class="input-group">
								<input type="email" class="form-control" id="search1" placeholder="Search">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default">Search</button>
								</span>
							</div>
						</form>

						<div class="hlinks">
							<span>
								<!-- item details with price -->
								<a href="#cart" role="button" data-toggle="modal">
									3 Item(s) in your <i class="fa fa-shopping-cart"></i>
								</a> -<span class="bold">$25</span>
							</span>
							<!-- Login and Register link -->
							<span class="lr">
							@if(Auth::user()==null)
								<a href="/login" role="button" data-toggle="modal">Login</a>
								or <a href="/register" role="button" data-toggle="modal">Register</a> </span>
							@else
								<a href="/logout" role="button" data-toggle="modal">logout</a> </span>
								@if(Auth::user()->hasRole('admin'))
									<br /><br />
									<span class="lr"><a href="/admin" role="button" data-toggle="modal">Painel do Admin</a></span>
								@endif
							@endif

						</div>

					</div>
				</div>
			</div>
		</header>
		<!--/ Header ends -->

		<!-- Navigation -->
		<div class="navbar bs-docs-nav" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
					<ul class="nav navbar-nav">
						<li>
							<a href="/">Home </a>
						</li>
						<li>
							<a href="/perfil">Perfil</a>
						</li>
						<li>
							<a href="/finalizadas" >Ações finalizadas</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Smartphones <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="items.html">HTC</a></li>
								<li><a href="items.html">Samsung</a></li>
								<li><a href="items.html">Apple</a></li>
								<li><a href="items.html">Motorola</a></li>
								<li><a href="items.html">Nokia</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tablets <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="items.html">Samsung</a></li>
								<li><a href="items.html">Micromax</a></li>
								<li><a href="items.html">Apple</a></li>
							</ul>
						</li>
						<li><a href="support.html">Support</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!--/ Navigation End -->


	@yield('content')
