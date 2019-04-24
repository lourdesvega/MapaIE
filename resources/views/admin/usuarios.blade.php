
@extends('layouts.tabla')

@section('nomtabla')
Usuarios
@endsection

@section('agregar')


@include('admin.altaUsuario')


@endsection

@section('encabezado')

<th>#</th>
<th style="width: 22%;">Nombre</th>
<th style="width: 22%;">Correo</th>
<th>Estatus</th>
<th>Acciones</th>

@endsection

@section('cuerpo')


@foreach($usuarios as $usuario)
<tr>
	
	<td>{{$usuario->id}}</td>
	<td>{{$usuario->name}}</td>
	<td>{{$usuario->email}}</td>
	@if($usuario->estatus==1)
	<td>Activo</td>
	@else
	<td>Inactivo</td>
	@endif

	<td>
		
		<a href="{{ route('usuario.edit', $usuario->id) }}"  data-hover="tooltip" class="edit" title="Edit" data-target="#modal-edit-usuarios{{ $usuario->id }}" id="modal-edit" data-toggle="modal"><i class=" trigger material-icons">&#xE254;</i></a>




		<div id="modal-edit-usuarios{{ $usuario->id }}" class="modal fade">
			<div class="modal-dialog modal-lg contact-modal">
				<div class="modal-content">
					<form action="{{ route('usuario.update', $usuario->id) }}" method="POST" >
						@csrf
						@method('PUT')
						
						<div class="modal-header">				
							<h4 class="text-dark">Editar usuario {{$usuario->id}}</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>



						<div class="modal-body">

							<div class="col-md-8">
								<div class="form-group row">
									<label for="nombre" class="col-md-4 col-form-label text-dark text-md-right">Nombre completo</label>
									<div class="col-md-8">
										<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{old('name',$usuario->name)}}" required autofocus>

										@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
										@endif
									</div>    
								</div>
							</div>	

							<div class="col-md-8">
								<div class="form-group row">
									<label for="descE" class="col-md-4 col-form-label text-dark text-md-right">Correo</label>
									<div class="col-md-8">
										<input type="text" value="{{old('email',$usuario->email)}}" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" required>

										@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif    
									</div>    
								</div>
							</div>	

							<div class="col-md-8">
								<div class="form-group row">
									<label for="nombre" class="col-md-4 col-form-label text-dark text-md-right">Contraseña</label>
									<div class="col-md-8">
										<input type="password" value="{{old('password',$usuario->password)}}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  id="password" >

										@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
									</div>    
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group row">
									<label for="descE" class="col-md-4 col-form-label text-dark text-md-right">Estatus</label>
									<div class="col-md-8">
										<select name="estatus" class="form-control" id="estatus"> 

											<option value=1> Activar </option>                         
											<option  value=2> Desactivar </option> 
										</select>    
									</div>    
								</div>
							</div>		

						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-primary" value="Actualizar">
						</div>
					</form>
				</div>
			</div>
		</div>

		
		<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
		
	</td>
	
</tr>
@endforeach

@endsection
