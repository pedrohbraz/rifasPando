@extends('layouts.app')
@section('content')


<h1 align="center" style="font-size: 40px"> Seja Bem Vindo {{ Auth::user()->name }} </h1>

<!----------------------------->
<!-- Features Wrapper -->
		<!--	<div id="features-wrapper">
				<div class="5grid-layout">
					<div class="row">
						<div class="4u">

							<!-- Box -->-->
								<section class="box box-feature">
									<a href="#" class="image image-full"><img src="images/pic01.jpg" alt="" /></a>
									<div class="inner">
										<header>
											<h2>Atualizar Perfil</h2>
									<!--		<span class="byline">Maybe here as well I think</span>-->
										</header>
										<p>Você pode alterar suas informações pessoais e de contato. Lembre-se de sempre manter seus dados atualizados</p>
									</div>
								</section>

						</div>
						<div class="4u">

							<!-- Box -->
								<section class="box box-feature">
									<a href="#" class="image image-full"><img src="images/pic02.jpg" alt="" /></a>
									<div class="inner">
										<header>
											<h2>Ações organizadas</h2>
										<!--	<span class="byline">This is also an interesting subtitle</span>-->
										</header>
										<p>Gerencie todas as Ações que você está organizando ou que já organizou</p>
									</div>
								</section>

						</div>
						<div class="4u">

							<!-- Box -->
								<section class="box box-feature last">
									<a href="#" class="image image-full"><img src="images/pic03.jpg" alt="" /></a>
									<div class="inner">
										<header>
											<h2>Ações que está concorrendo</h2>
									<!--		<span class="byline">Here's another intriguing subtitle</span>-->
										</header>
										<p>Veja aqui todas as ações que você está participando ou já participou !</p>
									</div>
								</section>

						</div>
					</div>
				</div>
			</div>


@endsection
