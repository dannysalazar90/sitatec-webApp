@extends('master')

@section('content')

<div class="row marketing">
	<h3>Asignar Rango a Operador:</h3>

	{{ Form::open(array('url' => 'asignarRango', 'class'=>'form-control', 'role'=> 'form')) }}
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
			{{Form::label('operator_list', 'Operador:')}}
			<select class="form-control" name="operator_list">
			  	@foreach($operadores as $operador)
				<option value={{ $operador->id }}>{{ $operador->operator_name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{{Form::label('range', 'Rango:')}}
			{{Form::text('range', Input::old('nombre'), array('class'=>'form-control', 'pattern'=>'|^([0-9]+\s*)+$|', 'maxlength'=>'3', 'placeholder'=>'Digite los 3 primeros numeros...', 'autocomplete'=>'off'))}}
		</div>

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>

@stop