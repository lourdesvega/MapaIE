@extends('layout')

@section('content')


<h3 style="align-content: center;">Evento</h3>

<hr>

<h4 style="align-content: center;">{{$evento->nomEvento}}</h4>


<b>Descripción:</b> {{$evento->descEvento}}<br>

@if($evento->fechaI == $evento->fechaF)
<b>Fecha: </b>{{$evento->fechaI}}
@else
<b>Fecha: </b>{{$evento->fechaI}}-{{$evento->fechaF}}
@endif

<hr>
</a>
<a href="/busqueda" class="btn btn-success  btn-sm" role="button" >Volver a eventos</a>

@endsection
@section('puntero')

@foreach($edificios as $edificio)
<a href="{{ route('resultadoEdi', $edificio->id)}}">
<img style="position:absolute; left:{{$edificio->latitud}}px; top:{{$edificio->longitud}}px; z-index:1;" height="35" SRC="/icono.png" width="35">
</a>
@endforeach

@endsection


<!-- Modal -->
