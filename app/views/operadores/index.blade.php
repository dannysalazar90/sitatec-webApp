@extends('master')

@section('content')

<div class="row marketing">
	<h3>Crear Operador:</h3>

	{{ Form::open(array('url' => 'operadores')) }}
		@if(Session::get('mensaje'))
		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
		@endif
		<div class="form-group">
			{{Form::label('operator_name', 'Nombre del Operador:')}}
			{{Form::text('operator_name', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre de Operador', 'autocomplete'=>'off'))}}
		</div>
		@if($errors->has('operator_name'))
		<div class="alert alert-danger">
			@foreach($errors->get('operator_name') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>
<h3>Operadores:</h3>
<div class="list-group">
	@foreach($operadores as $operador)
	<a href="operadores/{{$operador->id}}" class="btn btn-info">{{$operador->operator_name}}</a>
	@endforeach
</div>

@stop