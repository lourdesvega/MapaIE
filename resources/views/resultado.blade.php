@extends('layout')
@section('content')

<h1 style="align-content: center;">Edificio T</h1>
<hr>

Edificio de salones de la carrera de Sistemas y Tics, con laboratorios de redes y multimedia
<a href="#modalImg"  data-toggle="modal">
	<img height="20%" SRC="edificioT.jpg"  width="30%">
</a>
<hr>
<h3>Infraestructura</h3>
<img height="5%" SRC="sanitarios.jpg"  width="10%"> Baños
<br>
<br>
<img height="5%" SRC="centroc.png"  width="10%"> Laboratorios de Redes y multimedia
<br>
<br>
<img height="5%" SRC="cubiculos.jpg"  width="10%"> Cubiculos de profesores
@endsection



@section('puntero')
<img style="position:absolute; left:640px; top:325px; z-index:1;" height="35" SRC="icono.png" width="35">


@endsection
<div id="modalImg" class="modal fade">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
			<div class="modal-header">				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<img height="90%" SRC="edificioT.jpg"  width="90%">
			</div>
		</div>
	</div>
</div>
