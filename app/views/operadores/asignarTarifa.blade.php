@extends('master')

@section('content')

<div class="row marketing">
	<h3>Asignar Tarifa entre Operadores:</h3>

	{{ Form::open(array('url' => 'asignarTarifa', 'class'=>'form-control', 'role'=> 'form')) }}
		@if(Session::get('mensaje'))
		<div class="alert alert-success">{{Session::get('mensaje')}}</div>
		@endif
		@if($errors->has('tarifa'))
		<div class="alert alert-danger">
			@foreach($errors->get('tarifa') as $error)
				*{{ $error }}</br>
			@endforeach
		</div>
		@endif
		<div class="form-group">
			{{Form::label('operator_list', 'Origen:')}}
			<select class="form-control" name="operator_list_origen">
			  	@foreach($operadores as $operador)
				<option value={{ $operador->id }}>{{ $operador->operator_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">	
			{{Form::label('operator_list', 'Destino:')}}
			<select class="form-control" name="operator_list_destino">
			  	@foreach($operadores as $operador)
				<option value={{ $operador->id }}>{{ $operador->operator_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			{{Form::label('tarifa', 'Tarifa:')}}
			{{Form::text('tarifa', Input::old('nombre'), array('class'=>'form-control', 'pattern'=>'|^([0-9]+\s*)+$|', 'maxlength'=>'6', 'placeholder'=>'Digite la tarifa...', 'autocomplete'=>'off'))}}
		</div>
		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>

@stop