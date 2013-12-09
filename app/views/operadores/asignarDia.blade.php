@extends('master')

@section('content')

<div class="row marketing">
	<h3>Asignar Dia Especial a Operador:</h3>

	{{ Form::open(array('url' => 'asignarDia', 'class'=>'form-control', 'role'=> 'form')) }}
		@if(Session::get('mensaje'))
		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
		@endif
		@if($errors->has('dia'))
		<div class="alert alert-danger">
			@foreach($errors->get('dia') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		<div class="form-group">
			{{Form::label('name', 'Nombre del Dia:')}}
			{{Form::text('name', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre...', 'autocomplete'=>'off'))}}
		</div>
		<div class="form-group">
			{{Form::label('operator_list', 'Operador:')}}
			<select class="form-control" name="operator_list">
			  	@foreach($operadores as $operador)
				<option value={{ $operador->id }}>{{ $operador->operator_name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{{Form::label('day_list', 'Dia Especial:')}}
			<select class="form-control" name="dia">
				<option value=1>Lunes</option>
				<option value=2>Martes</option>
				<option value=3>Miercoles</option>
				<option value=4>Jueves</option>
				<option value=5>Viernes</option>
				<option value=6>Sabado</option>
				<option value=7>Domingo</option>
			</select>
		</div>

		<div class="form-group">
			{{Form::label('porcentaje', 'Porcentaje de Descuento:')}}
			{{Form::text('porcentaje', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Porcentaje...', 'autocomplete'=>'off'))}}
		</div>

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>

@stop