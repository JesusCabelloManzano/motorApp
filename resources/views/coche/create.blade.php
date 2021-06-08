@extends('layouts.app')

@section('content')
	<div class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-user-account-holder">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-user-section-title">
									<h4>Vende tu coche</h4>
								</div>
							</div>
							<form action="{{ url('coche') }}" method="POST" enctype="multipart/form-data" class="user-post-vehicles">
							@csrf
							
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6>Información del Vehiculo</h6>
									</div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Título*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" max="150" placeholder="Título del anuncio" name="titulo" value="{{ old('titulo') }}" required>
										</div>
									</div>
									@error('titulo')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Tipo de vehículo*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select data-placeholder="Selecciona tipo de vehículo" tabindex="-1" class="chosen-select chosen-container @error('tipo_id') is-invalid @enderror" id="vehicletype-dd" name="tipo_id" value="{{ old('tipo_id') }}" required>
                                        		<option selected value="" disabled>Selecciona tipo de vehículo</option>
                                                @foreach($vehicle_types as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach                                                                                                                                 
                                            </select>
										</div>
									</div>
									@error('tipo_id')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Marca*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="0" class="chosen-select chosen-container @error('marca_id') is-invalid @enderror" id="make-dd" name="marca_id" value="{{ old('marca_id') }}" required>
												<option value="" disabled selected>Selecciona una marca</option>
                                        		<option value="" disabled>Selecciona primero un tipo de vehiculo</option>
                                            </select>
										</div>
									</div>
									@error('marca_id')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Año*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="1" class="chosen-select chosen-container @error('anio_id') is-invalid @enderror" id="makeyear-dd" name="anio_id" value="{{ old('anio_id') }}" required>
            							    	<option value="" disabled selected>Selecciona año de matriculación</option>
            							    	<option value="" disabled>Seleccione primero una marca</option>
                                            </select>
										</div>
									</div>
									@error('anio_id')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Modelo*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select data-placeholder="Selecciona Modelo" tabindex="2" class="chosen-select chosen-container @error('modelo_id') is-invalid @enderror" id="modelcar-dd" name="modelo_id" value="{{ old('modelo_id') }}" required>
            							    	<option value="" disabled selected>Selecciona un modelo</option>
            							    	<option value="" disabled>Seleccione primero un año</option>
                                            </select>
										</div>
									</div>
									@error('modelo_id')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Mano del vehiculo</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="2" class="chosen-select chosen-container @error('mano') is-invalid @enderror" id="mano-dd" name="mano" value="{{ old('mano') }}">
            							    	<option value="" disabled selected>Selecciona una calidad del vehiculo</option>
            							    	@foreach($manos as $id => $nombre)
								                    <option value="{{ $id }}" @if(old('mano') == $id) selected @endif>{{ $nombre }}</option>
								                @endforeach
                                            </select>
										</div>
									</div>
									@error('mano')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Kilómetros*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input  type="number" step="1" maxlength="99999999999999" minlength="1" required class="form-control @error('km') is-invalid @enderror" id="kilometros" placeholder="Kilómetros del vehiculo" name="km" value="{{ old('km') }}">
										</div>
									</div>
									@error('km')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Precio* (€)</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input  type="number" step="0.01" maxlength="99999999999999.99" minlength="0.01" required class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="Precio del vehiculo" name="precio" value="{{ old('precio') }}">
										</div>
									</div>
									@error('precio')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6 class="Cocheh6"><i class="cs-color icon-engine"></i>Motor</h6>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>CV (€)</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input type="number" step="1" maxlength="99999" minlength="1" class="form-control @error('cv') is-invalid @enderror" id="cv" placeholder="Caballaje del vehiculo" name="cv" value="{{ old('cv') }}">
										</div>
										
									</div>
									@error('cv')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Combustible</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="2" class="chosen-select chosen-container @error('combustible') is-invalid @enderror" id="combustible-dd" name="combustible" value="{{ old('combustible') }}">
            							    	<option value="" disabled selected>Selecciona un tipo de combustible</option>
            							    	@foreach($combustibles as $id => $nombre)
								                    <option value="{{ $id }}" @if(old('combustible') == $id) selected @endif>{{ $nombre }}</option>
								                @endforeach
                                            </select>
										</div>
									</div>
									@error('combustible')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6 class="Cocheh6"><i class="cs-color icon-vehicle92"></i>Transmisión</h6>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Cambio*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="2" class="chosen-select chosen-container @error('cambio') is-invalid @enderror" required id="cambio-dd" name="cambio" value="{{ old('cambio') }}" required>
            							    	<option value="" disabled selected>Selecciona un tipo de cambio</option>
            							    	@foreach($cambios as $id => $nombre)
								                    <option value="{{ $id }}" @if(old('cambio') == $id) selected @endif>{{ $nombre }}</option>
								                @endforeach
                                            </select>
										</div>
									</div>
									@error('cambio')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>

								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6 class="Cocheh6">Más detalles</h6>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Color*</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input  type="text" class="form-control @error('color') is-invalid @enderror" id="color" max="40" placeholder="Color del vehiculo" name="color" value="{{ old('color') }}" required>
										</div>
									</div>
									@error('color')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Puertas</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="2" class="chosen-select chosen-container @error('puertas') is-invalid @enderror" id="puertas-dd" name="puertas" value="{{ old('puertas') }}">
            							    	<option value="" disabled selected>Selecciona cuantas puertas tiene el vehiculo</option>
            							    	@foreach($puertas as $id => $nombre)
								                    <option value="{{ $id }}" @if(old('puertas') == $id) selected @endif>{{ $nombre }}</option>
								                @endforeach
                                            </select>
										</div>
									</div>
									@error('puertas')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Plazas</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select tabindex="2" class="chosen-select chosen-container @error('plazas') is-invalid @enderror" id="plazas-dd" name="plazas" value="{{ old('plazas') }}">
            							    	<option value="" disabled selected>Selecciona cuantas plazas tiene el vehiculo</option>
            							    	@foreach($plazas as $id => $nombre)
								                    <option value="{{ $id }}" @if(old('plazas') == $id) selected @endif>{{ $nombre }}</option>
								                @endforeach
                                            </select>
										</div>
									</div>
									@error('plazas')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Provincia</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<select data-placeholder="Selecciona provincias" tabindex="2" class="chosen-select chosen-container @error('provincia_id') is-invalid @enderror" id="provincia-dd" name="provincia_id" value="{{ old('provincia_id') }}">
            							    	<option value="" disabled selected>Selecciona una provincia</option>
            							    	@foreach($states as $dataComunidades)
                                                    <option value="{{ $dataComunidades->id }}">{{ $dataComunidades->name }}</option>
                                                @endforeach
                                            </select>
                                            <em>Solo provincias Españolas</em>
										</div>
									</div>
									@error('provincia')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Descripción</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<textarea name="comentario" maxlength="3000" id="comentario" value="{{ old('comentario') }}"></textarea>
											<em><span id="descripcion"></span>/3000</em>
										</div>
									</div>
									@error('comentario')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<!--<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6 class="Cocheh6">Accesorios</h6>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								<div class="cs-field-holder">
									<ul class="cs-checkbox-list">
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check1" type="checkbox" name="check" value="check1">
												<label for="check1">Automatic Stability Control</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check2" type="checkbox" name="check" value="check1">
												<label for="check2">Car Kit</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check3" type="checkbox" name="check" value="check1">
												<label for="check3">Tire Pressure Monitoring</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check4" type="checkbox" name="check" value="check1">
												<label for="check4">Remote central locking</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check5" type="checkbox" name="check" value="check1">
												<label for="check5">Bluetooth</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check6" type="checkbox" name="check" value="check1">
												<label for="check6">Climate control</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check7" type="checkbox" name="check" value="check1">
												<label for="check7">Onboard computer</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check8" type="checkbox" name="check" value="check1">
												<label for="check8">Cruise Control</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check9" type="checkbox" name="check" value="check1">
												<label for="check9">Mirrors in body color</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check10" type="checkbox" name="check" value="check1">
												<label for="check10">Roof rails</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check11" type="checkbox" name="check" value="check1">
												<label for="check11">Outside temperature display</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check12" type="checkbox" name="check" value="check1">
												<label for="check12">Power sunroof</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check13" type="checkbox" name="check" value="check1">
												<label for="check13">Body-color bumpers</label>
											</div>
										</li>
										<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="cs-checkbox">
												<input id="check14" type="checkbox" name="check" value="check1">
												<label for="check14">Power windows front</label>
											</div>
										</li>
									</ul>
								</div>-->
								
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6>Subir Imagen</h6>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-upload-img">
											<ul id="cs-upload-ul">
											</ul>
											<p>Las imagenes solo pueden ser subidas en formato "jpeg, jpg, png, gif".</p>
											<p>Esta foto es para la foto principal (de portada). Luego puede seleccionar otra de las que subas.</p>
											<p>Luego podra subir más imagenes.</p>
											<div class="cs-browse-holder">
												<span class="file-input btn-file"> Subir imagen <input type="file" class="foto" name="foto" accept="image/*" onchange="readURL(this);"> </span> 
											</div>
										</div>
									</div>
									@error('foto')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
										<div class="cs-field">
											<div class="cs-btn-submit">
												<input type="submit" value="Publicar" >
											</div>
										</div>
									</div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-upload-img">
											<p>Los campos señalados con ' * ' indican que son obligatorios.</p>
										</div>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('assets/scripts/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function () {
        	
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
    
    <script type="text/javascript" src="{{url('assets/scripts/image-change-car.js')}}"></script>
    <script src="{{ url('assets/scripts/contador.js') }}"></script>
@endsection