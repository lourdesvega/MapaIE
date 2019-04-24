
@extends('layouts.tabla')


@section('nomtabla')
Eventos
@endsection

@section('agregar')


@include('admin.altaEvento')


@endsection

@section('encabezado')

<th style="width: 22%;">Nombre</th>
<th style="width: 22%;">Descripción</th>
<th>Fecha</th>
<th>Acciones</th>

@endsection

@section('cuerpo')

@foreach($eventos as $evento)

<tr>
	<td>{{$evento->nomEvento}}</td>
	<td>{{$evento->descEvento}}</td>
	@if($evento->fechaI == $evento->fechaF)
	<td>{{$evento->fechaI}}</td>
	@else
	<td>{{$evento->fechaI}} - {{$evento->fechaF}}</td>
	@endif
	<td>
		<form action="{{ route('evento.eliminar', $evento->id)}}" method="post">
			@csrf
			@method('PUT')
			<a href="{{ route('evento.edit', $evento->id) }}" class="edit" title="Editar" data-toggle="tooltip"><i class=" material-icons">&#xE254;</i></a>
			<button type="submit" class="btn btn-link edit" title="Eliminar" data-toggle="tooltip"> <i class="material-icons">&#xE872;</i></button>
		</form>
	</td>
	
</tr>
@endforeach


@endsection
