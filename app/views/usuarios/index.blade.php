@extends('master')

@section('content')

<div class="row marketing">
	<h3>Crear Usuario:</h3>

	{{ Form::open(array('url' => 'usuarios')) }}
		@if(Session::get('mensaje'))
		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
		@endif
		<div class="form-group">
			{{Form::label('username', 'Nombre de Usuario:')}}
			{{Form::text('username', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre de usuario', 'autocomplete'=>'off'))}}
		</div>
		@if($errors->has('username'))
		<div class="alert alert-danger">
			@foreach($errors->get('username') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		<div class="form-group">
			{{Form::label('email', 'Correo Electronico:')}}
			{{Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Correo Electronico', 'autocomplete'=>'off'))}}
		</div>
		@if($errors->has('email'))
		<div class="alert alert-danger">
			@foreach($errors->get('email') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		<div class="form-group">
			{{Form::label('password', 'Password:')}}
			{{Form::password('password')}}
		</div>
		@if($errors->has('password'))
		<div class="alert alert-danger">
			@foreach($errors->get('password') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>
<h3>Usuarios:</h3>
<div class="list-group">
	@foreach($usuarios as $usuario)
	<a href="#" class="list-group-item">{{$usuario->username}}</a>
	@endforeach
</div>

@stop