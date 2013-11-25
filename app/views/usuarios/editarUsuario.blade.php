@extends('master')

@section('content')

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Perfil</a></li>
      <li><a href="#profile" data-toggle="tab">Eliminar</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
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