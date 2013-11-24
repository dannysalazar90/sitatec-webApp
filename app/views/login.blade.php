<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>
		Ingreso al Sistema
	</title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/estilo.css') }}
</head>
<body>
<section class="container">
    <div class="logo">
      <img src="logo.jpg">
    </div>
    <div class="login">
      <h1>Ingreso al sistema:</h1>
      {{ Form::open(array('url' => 'login')) }}
      @if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
		@endif
        {{ Form::text('login', '', array('placeholder' => 'Usuario')) }}
        {{ Form::password('password', array('placeholder' => 'Contraseña')) }}
        <p class="submit">
        {{ Form::submit('Ingresar', array('class' => 'btn btn-success', 'name' => 'commit')) }}
        </p>
      {{ Form::close() }}
    </div>

    <div class="login-help">
      <p>Olvidaste tu contraseña? <a href="index.html">Click Aqui para restaurarla</a>.</p>
    </div>
  </section>
</body>
</html>