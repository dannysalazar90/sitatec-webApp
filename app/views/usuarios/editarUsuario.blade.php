@extends('master')

@section('content')

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Perfil</a></li>
      <li><a href="#profile" data-toggle="tab">Eliminar</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">

        {{ Form::open(array('url' => 'usuarios/')) }}
    @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
    @endif
    <div class="form-group">
      {{Form::label('username', 'Nombre de Usuario:')}}
      {{Form::text('username', {{$usuario->username}}, array('class'=>'input-xlarge'))}}
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

        <form id="tab">
            <label>Username</label>
            <input type="text" value="{{$usuario->username}}" class="input-xlarge">
            <label>Email</label>
            <input type="text" value="{{$usuario->email}}" class="input-xlarge">
            <label>New Password</label>
        	<input type="password" class="input-xlarge">
          	<div>
          		<a href="usuarios/{{$usuario->id}}" class="btn btn-primary">Actualizar</a>
        	    <button class="btn btn-primary">Update</button>
        	</div>
        </form>
      </div>
      <div class="tab-pane fade" id="profile">
    	<form id="tab2">
        	<div>
        	    <p><a href="#" class="btn btn-block btn-danger">Eliminar usuario: {{$usuario->username}}</a></p>
        	</div>
    	</form>
      </div>
  </div>

@stop