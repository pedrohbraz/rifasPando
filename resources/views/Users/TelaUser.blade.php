@extends('layouts.app')
@section('content')

<h1> Bem Vindo {{ Auth::user()->name }}</h1>

<div id="lateral">
<div id="menu">

<h3 class="link-titulo">Seu Perfil</h3>
<ul class="box">
    <li><a href="#">Atualizar Perfil</a></li>
  </ul>

<h3 class="link-titulo">Ações Organizadas</h3>
    <ul class="box">
      <!--  <li><a href="/acao/inserir">Criar Ação</a></li>-->
    <!--  <li> <button type="button" onclick="Mudarestado('minhaDiv')">Criar Ação</button></li>-->
        <li><a href="#" onclick="toggle('tela')">Criar Ação</a></li>
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

<!-- mais seções -->

</div> <!-- /#menu -->
</div id="link"> <!-- vazio --> <div>
</div> <!-- /#lateral -->

<div id="tela" style="display:none">
  <IFRAME src="/acao/inserir" width="900" height="900" scrolling="yes" frameborder="0" align="center"></IFRAME>
</div>

@endsection
