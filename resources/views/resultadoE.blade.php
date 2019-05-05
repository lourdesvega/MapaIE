@extends('layout')
@section('content')

<h3 style="align-content: center;">{{$edificio->nombre}}</h3>
<hr>

{{$edificio->descE}}
<hr>
<h4 style="align-content: center;">Fotos</h4>
<hr>
<div class="tz-gallery">

	@foreach($fotos as $foto)
<!--<a href="#foto{{$foto->id}}"  data-toggle="modal">
	<img height="20%" SRC="{{$foto->rutaF}}"  width="30%">
</a>-->


<a class="lightbox" href="{{$foto->rutaF}}">
	<img src="{{$foto->rutaF}}"  width="80%" title="{{$foto->descF}}">
</a>


@endforeach

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
	baguetteBox.run('.tz-gallery');
</script>
<hr>
<h4 style="align-content: center;">Infraestructura</h4>
<hr>
@foreach($infrae as $infra)
<img height="5%" SRC="{{$infra->rutaIcon}}"  width="15%"> {{$infra->nombreI}}
<br>
<br>
@endforeach
@endsection

<hr>

@section('puntero')
<img style="position:absolute; left:{{$edificio->latitud}}px; top:{{$edificio->longitud}}px; z-index:1;" height="35" SRC="/icono.png" width="35">


@endsection




