@extends('master')

@section('content')

<div class="row marketing">
	<h3>Asignar Fecha Especial a Operador:</h3>

	{{ Form::open(array('url' => 'asignarFecha', 'class'=>'form-control', 'role'=> 'form')) }}
		@if(Session::get('mensaje'))
		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
		@endif
		@if($errors->has('range'))
		<div class="alert alert-danger">
			@foreach($errors->get('range') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif

		<div class="form-group">
			{{Form::label('name', 'Nombre de la fecha:')}}
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
			{{Form::label('fecha', 'Elegir Fecha Especial:')}}
			<input type="date" class="form-control"  name="fecha" />
		</div>

		<div class="form-group">
			<div class="input-group">
			{{Form::label('porcentaje', 'Porcentaje de Descuento:')}}
			{{Form::text('porcentaje', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Porcentaje...', 'autocomplete'=>'off'))}}
  			<span class="input-group-addon">%</span>
			</div>
		</div>

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>

@stop