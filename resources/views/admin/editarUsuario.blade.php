
<!-- Button HTML (to Trigger Modal) -->


<!-- Modal HTML -->
<div id="#modal-edit-usuarios{{ $id }}" class="modal fade">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
	    <form action="/usuario/{{ $usuario->id }}" method="POST" >
					 @method('PUT')
					  @csrf
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
									<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  id="password" >

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
								<label for="descE" class="col-md-4 col-form-label text-dark text-md-right">Correo</label>
								<div class="col-md-8">
									<select name="estatus" class="form-control" id="estatus"> 

										<option value=1> Activar </option>                         
										<option  value=2> Desactivar </option> 
									</select>  

									@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif    
								</div>    
							</div>
						</div>		

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-primary" value="Registrar">
					</div>
				</form>
			</div>
		</div>
	</div>
