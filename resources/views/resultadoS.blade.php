@extends('layout')
@section('content')



<hr>

<h3 style="align-content: center;">{{$servicio->nomServicio}}</h3>
<hr>


           {{$servicio->descS}}
            <br><br>
           <b>Responsable:</b> {{$servicio->responsable}}
           <br><br>
           <b>Hora de atención:</b> {{$servicio->horaI}} - {{$servicio->horaF}}
           <br><br>
           <b>Contacto:</b> {{$servicio->telefono}}
           <br><br>
           <b>Planta:</b> {{$servicio->planta}}
           <br><br>
           <b>Edificio:</b> {{$edificio->nombre}}
       


<hr>

<h4 style="align-content: center;">Fotos</h4>
<hr>

<div class="tz-gallery">

	@foreach($fotos as $foto)
<!--<a href="#foto{{$foto->id}}"  data-toggle="modal">
	<img height="20%" SRC="{{$foto->rutaF}}"  width="30%">
</a>-->


<a class="lightbox" href="{{$foto->rutaF}}">
	<img src="{{$foto->rutaF}}"  width="80%" alt="{{$foto->descF}}">
</a>
@endforeach

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
	baguetteBox.run('.tz-gallery');
</script>

<a href="/busqueda" class="btn btn-success  btn-sm" role="button" >Volver a eventos</a>
<hr>
@endsection



@section('puntero')
<img style="position:absolute; left:{{$edificio->latitud}}px; top:{{$edificio->longitud}}px; z-index:1;" height="35" SRC="/icono.png" width="35">


@endsection




