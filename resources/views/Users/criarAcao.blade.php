@extends('layouts.app')
@section('content')

<h1 align="center"> </h1>

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                    </a>
                </li>

                <h3 class="link-titulo">Seu Perfil</h3>
<ul class="box">
    <li><a href="#">Atualizar Perfil</a></li>
  </ul>

<h3 class="link-titulo">Ações Organizadas</h3>
    <ul class="box">
      <!--  <li><a href="/acao/inserir">Criar Ação</a></li>-->
    <!--  <li> <button type="button" onclick="Mudarestado('minhaDiv')">Criar Ação</button></li>-->
        <li><a href="#" >Criar Ação</a></li>
        <li><a href="#">Ações em andamento</a></li>
        <li><a href="#">Ações fechadas</a></li>
        <!-- mais links -->
    </ul>

<h3 class="link-titulo">Ações compradas</h3>
    <ul class="box">
        <li><a href="#">Ações em andamento</a></li>
        <li><a href="#">Ações fechadas</a></li>
        <!-- mais links -->
    </ul>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Pagina Usuario</h1>
                        <p><IFRAME  src="/acao/inserir" width="900" height="900" scrolling="yes" frameborder="0" align="center"></IFRAME></p>
                        <p></code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
@endsection
