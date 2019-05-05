@extends('layout')

@section('content')

@foreach($edificios as $edificio)
<a href="{{ route('resultadoEdi', $edificio->id)}}">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
            <p class="text-dark textp">{{$edificio->nombre}}</p>
            <p class="text-secondary textsec">{{$edificio->descE}}</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="/salonQ.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>

@endforeach


@foreach($servicios as $servicio)
<a href="{{ route('resultadoSer', $servicio->id)}}">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
           <p class="text-dark textp">{{$servicio->nomServicio}}</p>
           <p class="text-secondary textsec">{{$servicio->descS}}
            <br><br>
           <b>Responsable:</b> {{$servicio->responsable}}
           <br><br>
           <b>Hora de atención:</b> {{$servicio->horaI}} - {{$servicio->horaF}}
           <br><br>
           <b>Télefono:</b> {{$servicio->telefono}}
           <br><br>
           <b>Planta:</b> {{$servicio->planta}}</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="salonQ.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>
@endforeach

@foreach($infrae as $inf)
<a href="{{ route('resultadoEdi', $inf->id)}}">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
            <p class="text-dark textp">{{$inf->nombre}}</p>
            <p class="text-secondary textsec">{{$inf->descE}}</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="/salonQ.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>

@endforeach

@endsection

@section('puntero')
@foreach($infrae as $inf)
<a href="{{ route('resultadoEdi', $inf->idEdi)}}">
<img style="position:absolute; left:{{$inf->latitud}}px; top:{{$inf->longitud}}px; z-index:1;" height="35" SRC="icono.png" title="{{$inf->nombreI}}" width="35">
</a>
@endforeach

@endsection
