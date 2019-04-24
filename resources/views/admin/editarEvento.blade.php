@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Editar Evento') }}</div>

				<div class="card-body">
					<form action="{{ route('evento.update', $evento->id) }}" method="POST" >
						@csrf
						@method('PUT')
						<div class="col-md-8">
							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-dark text-md-right">Nombre</label>
								<div class="col-md-8">
									<input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" value="{{$evento->nomEvento}}" requiredautofocus>

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
									<textarea type="text" name="descE" class="form-control {{ $errors->has('descE') ? ' is-invalid' : '' }}" id="descE" required autofocus>{{$evento->descEvento}}</textarea>

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
									<input type="date" name="fechaI" value="{{$evento->fechaI}}" class="form-control {{ $errors->has('fechaI') ? ' is-invalid' : '' }}" id="fechaI" required autofocus>

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
									<input type="date" value="{{$evento->fechaF}}" name="fechaF" class="form-control {{ $errors->has('fechaF') ? ' is-invalid' : '' }}" id="fechaI" required autofocus>

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
									<select class="selectpicker text-dark form-control {{ $errors->has('edificios') ? ' is-invalid' : '' }}" name="edificios[]" data-live-search="true" title="Selecciona edificio/s" data-hide-disabled="true" data-actions-box="true" multiple required autofocus>

										@foreach($ediselect as $edis)
										<option value="{{$edis->id}}" selected>{{$edis->nombre}}</option>
										@endforeach
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


						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<a href="{{ route('evento.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
								<input type="submit" class="btn btn-primary" value="Actualizar">

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
