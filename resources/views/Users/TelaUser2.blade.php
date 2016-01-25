@extends('layouts.app')
@section('content')

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
    <li><a href="/perfil/{{ Auth::user()->id }}/editar">Atualizar Perfil</a></li>
  </ul>

<h3 class="link-titulo">Ações Organizadas</h3>
    <ul class="box">
        <li><a href="acao/inserir">Criar Ação</a></li>
        <li><a href="/acao/{{ Auth::user()->id }}/organizadas/andamento/exibir">Ações em andamento</a></li>
        <li><a href="/acao/{{ Auth::user()->id }}/organizadas/fechadas/exibir">Ações fechadas</a></li>
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
                        <h1>Pagina Usuário</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>


@endsection
