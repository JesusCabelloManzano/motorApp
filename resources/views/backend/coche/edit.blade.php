@extends('backend.layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle">Vehiculo</h1>
		</div>
		
		<div class="row">
			<div class="col-12 col-lg-12">
			    <div class="card">
                <form action="{{ url('backend/coche/' . $coche->id) }}" method="POST" enctype="multipart/form-data" class="user-post-vehicles" id="user-post-vehicles">
				@csrf
				@method('put')
					<div class="card-header">
						<h5 class="card-title mb-0">Título</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $coche->titulo) }}" required>
					</div>
					@error('titulo')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Tipo</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('tipo_id') is-invalid @enderror" name="tipo_id" id="vehicletype-dd" value="{{ old('tipo_id', $coche->tipo_id) }}" required>
                            @foreach($vehicle_types as $data)
                            	@if($data->id == old('tipo_id', $coche->tipo_id))
									<option value="{{ $data->id }}" selected>{{ $data->name }}</option>
								@else
									<option value="{{ $data->id }}">{{ $data->name }}</option>
								@endif
                            @endforeach 
                        </select>
					</div>
					@error('tipo_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Marca</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('marca_id') is-invalid @enderror" name="marca_id" id="make-dd" value="{{ old('marca_id', $coche->marca_id) }}" required>
							@foreach($marcas as $marca)
								$marca->id
								@if($marca->id == old('marca_id', $coche->marca_id))
									<option value="{{ $marca->id }}" selected>{{ $marca->name }}</option>
								@else
									<option value="{{ $marca->id }}">{{ $marca->name }}</option>
								@endif
                            @endforeach
                        </select>
					</div>
					@error('marca_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Año</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('anio_id') is-invalid @enderror" name="anio_id" id="makeyear-dd" value="{{ old('anio_id', $coche->anio_id) }}" required>
							@foreach($años as $año)
								@if($año->id == old('anio_id', $coche->anio_id))
									<option value="{{ old('tipo_id', $coche->tipo_id) }}" selected>{{ $año->year }}</option>
								@else
									<option value="{{ $año->id }}">{{ $año->year }}</option>
								@endif
                            @endforeach
                        </select>
					</div>
					@error('anio_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Modelo</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('modelo_id') is-invalid @enderror" name="modelo_id" id="modelcar-dd" value="{{ old('modelo_id', $coche->modelo_id) }}" required>
                            @foreach($modelos as $modelo)
								@if($modelo->id == old('anio_id', $coche->anio_id))
									<option value="{{ old('modelo_id', $coche->modelo_id) }}" selected>{{ $modelo->name }}</option>
								@else
									<option value="{{ $modelo->id }}">{{ $modelo->name }}</option>
								@endif
                            @endforeach
                        </select>
					</div>
					@error('modelo_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Mano</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('mano') is-invalid @enderror" name="mano" value="{{ old('mano', $coche->mano) }}">
						<option value="" disabled selected>Selecciona una calidad del vehiculo</option>
					    	@foreach($manos as $id => $nombre)
			                    <option value="{{ $id }}" @if($coche->mano == $id) selected @endif>{{ $nombre }}</option>
			                @endforeach
			            </select>
					</div>
					@error('mano')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Precio</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio', $coche->precio) }}" required>
					</div>
					@error('precio')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Precio Financiado</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('precioFinanciado') is-invalid @enderror" name="precioFinanciado" value="{{ old('precioFinanciado', $coche->precioFinanciado) }}">
					</div>
					@error('precioFinanciado')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Kilómetros</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('km') is-invalid @enderror" name="km" value="{{ old('km', $coche->km) }}" required>
					</div>
					@error('km')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Caballos</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv', $coche->cv) }}">
					</div>
					@error('cv')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Provincia</h5>
					</div>
					<div class="card-body">
					    <select class="form-select mb-3 @error('provincia_id') is-invalid @enderror" name="provincia_id" value="{{ old('provincia_id', $coche->provincia_id) }}">
					    	<option value="" disabled selected>Selecciona una provincia</option>
					    	@foreach($states as $dataComunidades)
                                <option value="{{ $dataComunidades->id }}" @if($coche->provincia_id == $dataComunidades->id) selected @endif>{{ $dataComunidades->name }}</option>
                            @endforeach
                        </select>
					</div>
					@error('provincia_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Color</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color', $coche->color) }}" required>
					</div>
					@error('color')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Combustible</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('combustible') is-invalid @enderror" name="combustible" value="{{ old('combustible', $coche->combustible) }}">
					    	<option value="" disabled selected>Selecciona un tipo de combustible</option>
					    	@foreach($combustibles as $id => $nombre)
			                    <option value="{{ $id }}" @if ($coche->combustible == $id) selected @endif>{{ $nombre }}</option>
			                @endforeach
                        </select>
					</div>
					@error('combustible')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Cambio</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('cambio') is-invalid @enderror" name="cambio" value="{{ old('cambio', $coche->cambio) }}" required>
					    	<option value="" disabled selected>Selecciona un tipo de cambio</option>
					    	@foreach($cambios as $id => $nombre)
			                    <option value="{{ $id }}" @if ($coche->cambio == $id) selected @endif>{{ $nombre }}</option>
			                @endforeach
                        </select>
					</div>
					@error('cambio')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Plazas</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('plazas') is-invalid @enderror" name="plazas" value="{{ old('plazas', $coche->plazas) }}">
    				    	<option value="" disabled selected>Selecciona las plazas del vehiculo</option>
    				    	@foreach($plazas as $id => $nombre)
    		                    <option value="{{ $id }}" @if ($coche->plazas == $id) selected @endif>{{ $nombre }}</option>
    		                @endforeach
                        </select>
					</div>
					@error('plazas')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Puertas</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('puertas') is-invalid @enderror" name="puertas" value="{{ old('puertas', $coche->puertas) }}">
    				    	<option value="" disabled selected>Selecciona las plazas del vehiculo</option>
    				    	@foreach($puertas as $id => $nombre)
    		                    <option value="{{ $id }}" @if ($coche->puertas == $id) selected @endif>{{ $nombre }}</option>
    		                @endforeach
                        </select>
					</div>
					@error('puertas')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Verificar</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('verificado') is-invalid @enderror" name="verificado" value="{{ old('verificado', $coche->verificado) }}">
    				    	<option value="" disabled selected>Selecciona si verifica o no el vehiculo</option>
    				    	<option value="0">No</option>
    				    	<option value="1">Si</option>
                        </select>
					</div>
					@error('verificado')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Destacar</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('destacado') is-invalid @enderror" name="destacado" value="{{ old('destacado', $coche->destacado) }}">
    				    	<option value="" disabled selected>Selecciona si destaca o no el vehiculo</option>
    				    	<option value="0">No</option>
    				    	<option value="1">Si</option>
                        </select>
					</div>
					@error('destacado')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Retirar</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('causa') is-invalid @enderror" name="causa" value="{{ old('causa', $coche->causa) }}">
    				    	<option value="" disabled selected>Selecciona si retira o no el vehiculo</option>
    				    	<option value="nulo">No</option>
    				    	<option value="retirado">Si</option>
                        </select>
					</div>
					@error('causa')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Comentario</h5>
					</div>
					<div class="card-body">
						<textarea class="form-control @error('comentario') is-invalid @enderror" rows="5" placeholder="Escriba un comentario sobre el vehiculo" name="comentario" value="{{ old('comentario', $coche->comentario) }}">{{ $coche->comentario }}</textarea>
					</div>
					@error('comentario')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					@if($coche->foto != null)
						<div class="card-header">
							<h5 class="card-title mb-0">Imagen Portada</h5>
						</div>
						<div class="card-body">
							<img src="data:image/jpg;base64,{{ $coche->foto }}"></img>
							<button name="unsetcover" type="submit" class="btn btn-primary">Borrar fotografía de portada actual</button>
						</div>
					@else
					    <div class="card-header">
							<h5 class="card-title mb-0">Imagen Portada</h5>
						</div>
						<div class="card-body">
							<img src="{{ url('assets/images/default-image.png') }}" width="200px"></img>
						</div>
					@endif
					@error('foto')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror

					<div class="card-header">
						<h5 class="card-title mb-0">Imagenes</h5>
					</div>
					<div class="card-body" id="fotos">
					    @foreach($fotos as $foto)
							<img src="{{ asset(Storage::url($foto)) }}" alt="" width="200px"/>
							<button name="set" value="{{$foto}}" type="submit" class="btn btn-primary">Establecer como fotografía de portada actual</button>
                			<button name="unset" value="{{$foto}}" type="submit" class="btn btn-primary">Borrar fotografía</button>
						@endforeach
					</div>
					
					<div class="card-header">
					    <input type="file" class="btn btn-success" name="fotos[]" accept="image/*" onchange="readURL(this);" multiple>
					    
					</div>
					
					<div class="card-header">
						<input type="submit" class="btn btn-primary btn-lg" value="Guardar" >
					</div>
				</form>
			    </div>
			</div>
		</div>			
	</div>
				
    <script src="{{ url('assets/scripts/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function () {
        	
        	$('#vehicletype-dd').on('click', function () {
                var idVehicletype = this.value;
                $("#make-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-makes')}}",
                    type: "POST",
                    data: {
                        vehicletype_id: idVehicletype,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#make-dd').html('<option value="" disabled selected>Selecciona marca</option>');
                        $.each(result.makes, function (key, value) {
                            $("#make-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
                
                 $('#makeyear-dd').html('<option value="" disabled selected>Selecciona año de matriculación</option>');
                 $('#makeyear-dd').append('<option value="" disabled>Selecciona una marca primero</option>');
                 
                 $("#modelcar-dd").html('<option value="" disabled selected>Selecciona un modelo</option>');
                 $("#modelcar-dd").append('<option value="" disabled>Selecciona año de matriculacón primero</option>');
            });
        	
        	$('#vehicletype-dd').on('change', function () {
                var idVehicletype = this.value;
                $("#make-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-makes')}}",
                    type: "POST",
                    data: {
                        vehicletype_id: idVehicletype,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#make-dd').html('<option value="" disabled selected>Selecciona marca</option>');
                        $.each(result.makes, function (key, value) {
                            $("#make-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
                
                 $('#makeyear-dd').html('<option value="" disabled selected>Selecciona año de matriculación</option>');
                 $('#makeyear-dd').append('<option value="" disabled>Selecciona una marca primero</option>');
                 
                 $("#modelcar-dd").html('<option value="" disabled selected>Selecciona un modelo</option>');
                 $("#modelcar-dd").append('<option value="" disabled>Selecciona año de matriculacón primero</option>');
            });
            
            $('#make-dd').on('change', function () {
                var idMake = this.value;
                $("#makeyear-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-makeyears')}}",
                    type: "POST",
                    data: {
                        make_id: idMake,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#makeyear-dd').html('<option value="">Selecciona año de matriculación</option>');
                        $.each(result.make_years, function (key, value) {
                            $("#makeyear-dd").append('<option value="' + value
                                .id + '">' + value.year + '</option>');
                        });
                    }
                });
                
                $("#modelcar-dd").html('<option value="" disabled selected>Selecciona un modelo</option>');
                $("#modelcar-dd").append('<option value="" disabled>Selecciona año de matriculacón</option>');
            }); 
            
            $('#makeyear-dd').on('change', function () {
                var idMakeyear = this.value;
                $("#modelcar-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-modelscar')}}",
                    type: "POST",
                    data: {
                        makeyear_id: idMakeyear,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#modelcar-dd').html('<option value="" disabled selected>Selecciona un modelo</option>');
                        $.each(result.model_cars, function (key, value) {
                            $("#modelcar-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    },
                });
            });
            
        });
    </script>
    
    <script type="text/javascript" src="{{url('assets/backend/js/image-change-cars.js')}}"></script>
    <script src="{{ url('assets/scripts/contador.js') }}"></script>	
				
</main>
@endsection