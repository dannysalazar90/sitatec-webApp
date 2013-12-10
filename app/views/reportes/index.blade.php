@extends('master')

@section('content')

<div class="row marketing">
	<h3>Busqueda</h3>

	{{ Form::open(array('url' => 'reportes')) }}
		<div class="form-group">
			<input type="radio" name="search" value=1 checked>Origen: {{Form::text('origen', Input::old('origen'), array('class'=>'form-control', 'placeholder'=>'Buscar por Origen...', 'autocomplete'=>'off'))}}
		</div>
		<div class="form-group">
			<input type="radio" name="search" value=2>Destino {{Form::text('destino', Input::old('destino'), array('class'=>'form-control', 'placeholder'=>'Buscar por Destino...', 'autocomplete'=>'off'))}}
		</div>
		<div class="form-group">
			<input type="radio" name="search" value=3>Fecha: <input type="date" class="form-control"  name="fecha" />
		</div>
		<div class="form-group">
			<input type="radio" name="search" value=4>Duracion: {{Form::text('duracion', Input::old('duracion'), array('class'=>'form-control', 'placeholder'=>'Buscar por Duracion...', 'autocomplete'=>'off'))}}
		</div>
		<div class="form-group">
			<input type="radio" name="search" value=5>Valor: {{Form::text('valor', Input::old('valor'), array('class'=>'form-control', 'placeholder'=>'Buscar por Valor...', 'autocomplete'=>'off'))}}
		</div>

		{{Form::submit('Buscar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
	{{Form::close()}}
</div>

@stop