@extends('master')

@section('content')

<div id="tabla">
@if ($resultados == null)
{{$enviado}}
@else


<table class="table table-hover">
  <caption>Resultados:</caption>
  <thead>
    <tr>
      <th># Origen:</th>
      <th># Destino:</th>
      <th>Fecha:</th>
      <th>Duracion:</th>
      <th>Costo:</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($resultados as $resultado)
    <tr>
      <td>{{$resultado->numero_origen}}</td>
      <td>{{$resultado->numero_destino}}</td>
      <td>{{$resultado->fecha_inicio}}</td>
      <td>{{$resultado->duracion}}</td>
      <td>{{$resultado->precio}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endif

@stop