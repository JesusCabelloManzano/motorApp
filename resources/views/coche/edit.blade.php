@extends('layouts.app')

@section('content')
	<div class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					@if (session('status'))
	              		<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-warning3"></i><span>   {{ session('status') }}</span><a href="{{ route('verification.notice') }}"> Click, aqui!</a> 
						</div>
				    @endif
				    
				    @if (session('update'))
	              		<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-checkmark"></i><span>   {{ session('update') }}</span>
						</div>
				    @endif
				    
				    @if (session('error'))
	              		<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-blocked"></i><span>   {{ session('error') }}</span>
						</div>
				    @endif
					
					<div class="cs-user-account-holder">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-user-section-title">
									<h4>Vende tu coche</h4>
								</div>
							</div>
							<form action="{{ url('coche/' . $coche->id) }}" method="POST" enctype="multipart/form-data" class="user-post-vehicles" id="user-post-vehicles">
							@csrf
							@method('put')
								
								@if($coche->causa != 'nulo')
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<h6 class="Cocheh6">Activar</h6>
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-seprator"></div>
									</div>
								
									<div class="cs-field-holder">
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<label>Activar Vehiculo</label>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
											<div class="cs-field">
												<select data-placeholder="Selecciona una causa de retirada" tabindex="-1" class="chosen-select chosen-container" name="causa" value="{{ old('causa', $coche->causa) }}">
	                                        		<option selected value="" disabled>Selecciona una opcion si desea activar el vehiculo</option>
	                                                <option value="nulo">Activar</option>
	                                            </select>
	                                            <div class="cs-upload-img">
													<p>No esta obligado a señalar una opcion si no va a retirar el vehiculo.</p>
												</div>
											</div>
										</div>
										@error('causa')
							            	<div class="alert alert-danger">{{ $message }}</div>
							            @enderror
									</div>
								@endif
															
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
											<input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" max="150" placeholder="Título del anuncio" name="titulo" value="{{ old('titulo', $coche->titulo) }}" required>
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
											<select data-placeholder="Selecciona tipo de vehículo" tabindex="-1" class="chosen-select chosen-container" id="vehicletype-dd" name="tipo_id" value="{{ old('tipo_id', $coche->tipo_id) }}" required>
                                        		<option selected value="" disabled>Selecciona tipo de vehículo</option>
                                                @foreach($vehicle_types as $data)
                                                        <option value="{{ $data->id }}" @if($coche->tipo_id == $data->id) selected @endif>{{ $data->name }}</option>
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
											<select tabindex="0" class="chosen-select chosen-container" id="make-dd" name="marca_id" value="{{ old('marca_id', $coche->marca_id) }}" required>
                                        		@foreach($dataMarcas as $dataMarca)
                                                        <option value="{{ $dataMarca->id }}" @if($coche->marca_id == $dataMarca->id) selected @endif>{{ $dataMarca->name }}</option>
                                                @endforeach
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
											<select tabindex="1" class="chosen-select chosen-container" id="makeyear-dd" name="anio_id" value="{{ old('anio_id', $coche->anio_id) }}" required>
            							    	@foreach($dataAños as $dataAño)
                                                        <option value="{{ $dataAño->id }}" @if($coche->anio_id == $dataAño->id) selected @endif>{{ $dataAño->year }}</option>
                                                @endforeach
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
											<select data-placeholder="Selecciona Modelo" tabindex="2" class="chosen-select chosen-container @error('modelo_id') is-invalid @enderror" id="modelcar-dd" name="modelo_id" value="{{ old('modelo_id', $coche->modelo_id) }}" required>
            							    	@foreach($dataModelos as $dataModelo)
                                                        <option value="{{ $dataModelo->id }}" @if($coche->modelo_id == $dataModelo->id) selected @endif>{{ $dataModelo->name }}</option>
                                                @endforeach
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
											<select tabindex="2" class="chosen-select chosen-container @error('mano') is-invalid @enderror" id="mano-dd" name="mano" value="{{ old('mano', $coche->mano) }}">
            							    	<option value="" disabled selected>Selecciona una calidad del vehiculo</option>
            							    	@foreach($manos as $id => $nombre)
								                    <option value="{{ $id }}" @if($coche->mano == $id) selected @endif>{{ $nombre }}</option>
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
											<input  type="number" step="1" maxlength="99999999999999" minlength="1" required class="form-control @error('km') is-invalid @enderror" id="kilometros" placeholder="Kilómetros del vehiculo" name="km" value="{{ old('km', $coche->km) }}">
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
											<input  type="number" step="1" maxlength="99999999999999" minlength="1" required class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="Precio del vehiculo" name="precio" value="{{ old('precio', $coche->precio) }}">
										</div>
									</div>
									@error('precio')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label>Precio Financiado (€)</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input  type="number" step="1" maxlength="99999999999999" minlength="1" class="form-control @error('precioFinanciado') is-invalid @enderror" id="precioFinanciado" placeholder="Precio del vehiculo" name="precioFinanciado" value="{{ old('precioFinanciado', $coche->precioFinanciado) }}">
										</div>
									</div>
									@error('precioFinanciado')
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
										<label>CV</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input type="number" step="1" maxlength="99999" minlength="1" class="form-control @error('cv') is-invalid @enderror" id="cv" placeholder="Caballaje del vehiculo" name="cv" value="{{ old('cv', $coche->cv) }}">
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
											<select tabindex="2" class="chosen-select chosen-container @error('combustible') is-invalid @enderror" id="combustible-dd" name="combustible" value="{{ old('combustible', $coche->combustible) }}">
            							    	<option value="" disabled selected>Selecciona un tipo de combustible</option>
            							    	@foreach($combustibles as $id => $nombre)
								                    <option value="{{ $id }}" @if ($coche->combustible == $id) selected @endif>{{ $nombre }}</option>
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
											<select tabindex="2" class="chosen-select chosen-container @error('cambio') is-invalid @enderror" required id="cambio-dd" name="cambio" value="{{ old('cambio', $coche->cambio) }}" required>
            							    	<option value="" disabled selected>Selecciona un tipo de cambio</option>
            							    	@foreach($cambios as $id => $nombre)
								                    <option value="{{ $id }}" @if($coche->cambio == $id) selected @endif>{{ $nombre }}</option>
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
											<input  type="text" class="form-control @error('color') is-invalid @enderror" id="color" max="40" placeholder="Color del vehiculo" name="color" value="{{ old('color', $coche->color) }}" required>
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
											<select tabindex="2" class="chosen-select chosen-container @error('puertas') is-invalid @enderror" id="puertas-dd" name="puertas" value="{{ old('puertas', $coche->puertas) }}">
            							    	<option value="" disabled selected>Selecciona cuantas puertas tiene el vehiculo</option>
            							    	@foreach($puertas as $id => $nombre)
								                    <option value="{{ $id }}" @if($coche->puertas == $id) selected @endif>{{ $nombre }}</option>
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
											<select tabindex="2" class="chosen-select chosen-container @error('plazas') is-invalid @enderror" id="plazas-dd" name="plazas" value="{{ old('plazas', $coche->plazas) }}">
            							    	<option value="" disabled selected>Selecciona cuantas plazas tiene el vehiculo</option>
            							    	@foreach($plazas as $id => $nombre)
								                    <option value="{{ $id }}" @if($coche->plazas == $id) selected @endif>{{ $nombre }}</option>
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
											<select data-placeholder="Selecciona provincias" tabindex="2" class="chosen-select chosen-container @error('provincia_id') is-invalid @enderror" id="provincia-dd" name="provincia_id" value="{{ old('provincia_id', $coche->provincia_id) }}">
            							    	<option value="" disabled selected>Selecciona una provincia</option>
            							    	@foreach($states as $dataComunidades)
                                                    <option value="{{ $dataComunidades->id }}" @if($coche->provincia_id == $dataComunidades->id) selected @endif>{{ $dataComunidades->name }}</option>
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
											<textarea name="comentario" maxlength="3000" id="comentario" value="{{ old('comentario', $coche->comentario) }}">{{$coche->comentario}}</textarea>
											<em><span id="descripcion"></span>/3000</em>
										</div>
									</div>
									@error('comentario')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6>Foto de portada</h6>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								
                                <div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-upload-img">
											<ul id="fotoPortada">
												@if($coche->foto != null)
											     <li>
											         <a onclick="borrarAPortada()" data-toggle="tooltip" data-placement="top" title="Borrar imagen de portada"><img src="data:image/jpeg;base64,{{ $coche->foto }}" alt="" onclick="borrarPortada()"/></a>
											     </li>
											     <button name="unsetcover" type="submit" class="btn btn-secondary" id="borrarFotoPortada" style="display: none;"></button>
											    @else
											     <li>
											         <a data-toggle="tooltip" data-placement="top" title="Borrar imagen de portada"><img src="{{ url('assets/images/default-image.png') }}" alt=""/></a>
											     </li>
											     <p>Esta es la imagen por defecto.</p>
											    @endif
											</ul>
											<p>Esta es su imagen de portada inicial.</p>
											<p>Puede cambiarla por cualquiera de las de abajo.</p>
											<p>Puede borrarla y dejarla vacia.</p>
										</div>
									</div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6>Imagenes actuales</h6>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-upload-img">
											<ul id="fotos">
												<?php
										    		$contador = 0;
										    	?>
											    @foreach($fotos as $foto)
                                                    <div class="form-group">
                                                        <li>
        											         <a onclick="borrarAImg(<?php echo $contador; ?>)" name="unset" data-toggle="tooltip" data-placement="top" title="Borrar imagen"><img src="{{ asset(Storage::url($foto)) }}" alt="" onclick="borrarImg(<?php echo $contador; ?>)"/></a>
        											     </li>
        											     <button name="set" value="{{$foto}}" type="submit" class="btn btn-secondary">Establecer como imagen de portada actual</button>
                                                         <button name="unset" value="{{$foto}}" type="submit" class="btn btn-secondary" id="botonBorrar<?php echo $contador; ?>" style="display: none;"></button>
                                                    </div>
                                                    <?php
											    		$contador++;
											    	?>
                                                @endforeach
											</ul>
											<p>Las imagenes solo pueden ser subidas en formato "jpeg, jpg, png, gif".</p>
											<div class="cs-browse-holder">
												<span class="file-input btn-file"> Subir imagen <input type="file" class="foto" name="fotos[]" accept="image/*" onchange="readURL(this);" multiple> </span> 
											</div>
										</div>
									</div>
									@error('foto')
						            	<div class="alert alert-danger">{{ $message }}</div>
						            @enderror
								</div>
								
								@if($coche->causa == 'nulo')
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<h6 class="Cocheh6">Retirar</h6>
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-seprator"></div>
									</div>
								
									<div class="cs-field-holder">
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<label>Retirar Vehiculo</label>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
											<div class="cs-field">
												<select data-placeholder="Selecciona una causa de retirada" tabindex="-1" class="chosen-select chosen-container" name="causa" value="{{ old('causa', $coche->causa) }}">
	                                        		<option selected value="" disabled>Selecciona una opcion de por que retira el vehiculo</option>
	                                                @foreach($causas as $id => $nombre)
	                                                        <option value="{{ $id }}" @if($coche->causa == $id) selected @endif>{{ $nombre }}</option>
	                                                @endforeach                                                                                                                                 
	                                            </select>
	                                            <div class="cs-upload-img">
													<p>No esta obligado a señalar una opcion si no va a retirar el vehiculo.</p>
												</div>
											</div>
										</div>
										@error('causa')
							            	<div class="alert alert-danger">{{ $message }}</div>
							            @enderror
									</div>
								@endif
								
								<div class="cs-field-holder">
									<div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
										<div class="cs-field">
											<div class="cs-btn-submit">
												<input type="submit" value="Guardar" >
											</div>
										</div>
									</div>
								</div>
								
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										
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
    
    <script type="text/javascript" src="{{url('assets/scripts/image-change-cars.js')}}"></script>
    <script src="{{ url('assets/scripts/contador.js') }}"></script>
@endsection