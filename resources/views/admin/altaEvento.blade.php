
<!-- Button HTML (to Trigger Modal) -->

<a href="#nuevoEvento" class="trigger btn btn-primary" data-toggle="modal" role="button">Nuevo Evento</a>

<!-- Modal HTML -->
<div id="nuevoEvento" class="modal fade">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
			<form method="POST" action="{{ route('evento.store') }}">
				 	@csrf
				<div class="modal-header">				
					<h4 class="text-dark">Nuevo Evento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="col-md-8">
						<div class="form-group row">
							<label for="nombre" class="col-md-4 col-form-label text-dark text-md-right">Nombre</label>
							<div class="col-md-8">
								<input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" requiredautofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
							</div>    
						</div>
					</div>	

					<div class="col-md-8">
						<div class="form-group row">
							<label for="descE" class="col-md-4 col-form-label text-dark text-md-right">Descripcion</label>
							<div class="col-md-8">
								<textarea type="text" name="descE" class="form-control {{ $errors->has('descE') ? ' is-invalid' : '' }}" id="descE" required autofocus>
								</textarea>
                                @if ($errors->has('descE'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descE') }}</strong>
                                    </span>
                                @endif

							</div>    
						</div>
					</div>	

					<div class="col-md-8">
						<div class="form-group row">
							<label for="fecha" class="col-md-4 col-form-label text-dark text-md-right">Fecha Inicio</label>
							<div class="col-md-5">
								<input type="date" name="fechaI" class="form-control {{ $errors->has('fechaI') ? ' is-invalid' : '' }}" id="fechaI" required autofocus>

                                @if ($errors->has('fechaI'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaI') }}</strong>
                                    </span>
                                @endif 
							</div>    
						</div>
					</div>	

					<div class="col-md-8">
						<div class="form-group row">
							<label for="fecha" class="col-md-4 col-form-label text-dark text-md-right">Fecha Fin</label>
							<div class="col-md-5">
								<input type="date" name="fechaF" class="form-control {{ $errors->has('fechaF') ? ' is-invalid' : '' }}" id="fechaI" required autofocus>

                                @if ($errors->has('fechaF'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaF') }}</strong>
                                    </span>
                                @endif 
							</div>    
						</div>
					</div>	


				<div class="col-md-8">
					<div class="form-group row">              
						<label for="cct" class="col-md-4 col-form-label text-dark text-md-right">Edificios</label>
						<div class="col-md-8">
							 <select class="selectpicker form-control {{ $errors->has('edificios') ? ' is-invalid' : '' }}" name="edificios[]" data-live-search="true" title="Selecciona edificio/s" data-hide-disabled="true" data-actions-box="true" multiple required autofocus>


									@foreach($edificios as $edificio)
									<option value="{{$edificio->id}}">{{$edificio->nombre}}</option>
									@endforeach

							</select>

                                @if ($errors->has('edificios'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('edificios') }}</strong>
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



