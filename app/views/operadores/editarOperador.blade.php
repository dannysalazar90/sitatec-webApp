@extends('master')

@section('content')

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Perfil</a></li>
      <li><a href="#profile" data-toggle="tab">Eliminar</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">

        {{ Form::open(array('url' => 'operadores/'.$operador->id)) }}
    @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
    @endif
    <div class="form-group">
      {{Form::label('operator_name', 'Nombre de Operador:')}}
      {{Form::text('operator_name', $operador->operator_name, array('class'=>'input-xlarge'))}}
    </div>
    @if($errors->has('operator_name'))
    <div class="alert alert-danger">
      @foreach($errors->get('username') as $error)
        *{{ $error }}</br>
      @endforeach
    </div>
    @endif
      {{Form::hidden('operator_id', $operador->id)}}

    {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
    {{Form::reset('Borrar todo', array('class'=>'btn btn-default'))}}
  {{Form::close()}}
      </div>
      <div class="tab-pane fade" id="profile">
    	<form id="tab2">
        	<div>
            <p>
            {{ HTML::link('operadores/eliminar/'.$operador->id, 'Eliminar Operador: '.$operador->operator_name, array('class'=>'btn btn-block btn-danger')) }}
        	    </p>
        	</div>
    	</form>
      </div>
  </div>

@stop