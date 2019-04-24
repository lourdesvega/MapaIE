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
           <img src="salonQ.jpg" class=" float-right" alt="..." width="100" height="100">
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

<a href="#">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
            <p class="text-dark textp">Q</p>
            <p  class="text-secondary textsec">Edificio de salones de la carrera de Química, con laboratorio multimedia</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="salonQ.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>

<a href="#">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
            <p class="text-dark textp">T</p>
            <p  class="text-secondary textsec">Edificio de salones de la carrera de Sistemas y Tics, con laboratorios de redes y multimedia</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="edificioT.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>

<a href="#">
    <div class="row no-gutters  position-center">
        <div class="col-md-8 position-static ">
            <p class="text-dark textp">U</p>
            <p  class="text-secondary textsec">Edificio de salones de la carrera de Gestión empresarial</p>
        </div>
        <div class="col-md-0 mb-md-0 p-md-0">
           <img src="edificioU.jpg" class=" float-right" alt="..." width="100" height="100">
       </div>
   </div>
</a>
<hr>

@endsection
