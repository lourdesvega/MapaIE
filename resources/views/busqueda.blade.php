@extends('layout')

@section('content')
<h2 style="align-content: center;">Eventos</h2>
@foreach($eventos as $evento)
<a href="{{ route('evento.show', $evento->id) }}">
<hr>

<h4 style="align-content: center;">{{$evento->nomEvento}}</h4>


<b>Descripción:</b> {{$evento->descEvento}}<br>

@if($evento->fechaI == $evento->fechaF)
<b>Fecha: </b>{{$evento->fechaI}}
@else
<b>Fecha: </b>{{$evento->fechaI}} al {{$evento->fechaF}}
@endif

<hr>
</a>
@endforeach

@endsection
@section('puntero')



@endsection


<!-- Modal -->
