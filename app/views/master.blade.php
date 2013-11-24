<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>
		@section('title')
            SITATEC-webApp 1.0
        @show
	</title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/jumbotron-narrow.css') }}
</head>
<body>
	<!--<div class="row-fluid">
		<div class="span12 well">
			<h1>SITATEC App</h1>
		</div>
	</div>
-->
	<div class="container">
		<div class="logo">
      		<img src="logo.jpg">
    	</div>
		<div class="header">
			<ul class="nav nav-pills pull-right">
				@if(Auth::user())
				<li>{{ HTML::link('usuarios', 'Usuarios') }}</li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operadores <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Crear Operador</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Operaciones:</li>
                    <li><a href="#">Asignar Rango a Operador</a></li>
                    <li><a href="#">Asignar Tarifas a Operador</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fechas Especiales <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Crear Fecha Especial</a></li>
                    <li><a href="#">Crear Dia Especial</a></li>
                  </ul>
                </li>
                <li>{{ HTML::link('reportes', 'Reportes y Busqueda') }}</li>
				<li>{{ HTML::link('logout', 'Salir') }}</li>
				@else
				<li>{{ HTML::link('login', 'Ingresar') }}</li>
				@endif
			</ul>
			<h3 class="text-muted">{{ ucwords(Auth::user()->username) }}</h3>
		</div>
		<div class="span9">
			@yield('content')
		</div>
	</div>

<!--
	<div class="row-fluid">
		<div class="span3">
			<ul class="nav nav-list well">
			@if(Auth::user())
			<li class="nav-header">{{ ucwords(Auth::user()->username) }}</li>
			<li>{{ HTML::link('upload', 'Subir Archivo') }}</li>
			<li>{{ HTML::link('list', 'Generar Informe') }}</li>
			<li>{{ HTML::link('logout', 'Salir') }}</li>
			@else
			<li>{{ HTML::link('login', 'Ingresar') }}</li>
			@endif
			</ul>
		</div>
		<div class="span9">
			@yield('content')
		</div>
	</div>
-->
</body>
</html>