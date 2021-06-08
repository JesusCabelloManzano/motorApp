@extends('layouts.app')

@section('content')
<div class="page-section">
   <div class="container">
     <div class="row">
         <form method="GET" name="orderBy" action="{{ url('coches') }}">
          <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
             <div class="cs-listing-filters">
                    <div class="cs-search">
                        <div class="cs-filter-title"><h6>Tipo de vehiculo</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" id="vehicletype-dd" name="tipo" value="{{ old('tipo', $request->tipo) }}">
                                <option selected value="" disabled>Selecciona tipo de vehículo</option>
                                @foreach($vehicle_types as $data)
                                    @if($data -> id == $request->tipo)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach  
                         </select>
                       </div>
                   </div>
                    <div class="cs-search">
                        <div class="cs-filter-title"><h6>Marca</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" id="make-dd" name="marca" value="{{ old('marca', $request->marca) }}">
                             
                              @if(isset($request->marca))
                                  <option value="{{ $request->marca }}" selected>{{ $marcas->where('id', $request->marca)->first()->name }}</option>
                                  <option value="" disabled>Selecciona primero un tipo de vehiculo</option>
                              @else
                                  <option value="" disabled selected>Selecciona una marca</option>
                                  <option value="" disabled>Selecciona primero un tipo de vehiculo</option>
                              @endif
                         </select>
                       </div>
                   </div>
                   <div class="cs-search">
                        <div class="cs-filter-title"><h6>Año</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" id="makeyear-dd" name="año" value="{{ old('año', $request->año) }}">
            				      @if(isset($request->año))
                                      <option value="{{ $request->año }}" selected>{{ $años->where('id', $request->año)->first()->year }}</option>
                                      <option value="" disabled>Seleccione primero una marca</option>
                                  @else
                                      <option value="" disabled selected>Selecciona año de matriculación</option>
                                      <option value="" disabled>Seleccione primero una marca</option>
                                  @endif
                         </select>
                       </div>
                   </div>
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Modelo</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" id="modelcar-dd" name="modelo" value="{{ old('modelo', $request->modelo) }}">
                                  @if(isset($request->modelo))
                                      <option value="{{ $request->modelo }}" selected>{{ $modelos->where('id', $request->modelo)->first()->name }}</option>
                                      <option value="" disabled>Seleccione primero una marca</option>
                                  @else
                                      <option value="" disabled selected>Selecciona año de matriculación</option>
                                      <option value="" disabled>Seleccione primero una marca</option>
                                  @endif
                         </select>
                       </div>
                   </div>
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Provincia</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="provincia" value="{{ old('provincia', $request->provincia) }}">
                                <option value="" disabled selected>Seleccione la calidad del vehiculo</option>
                                @foreach($provincias as $provincia)
                                    @if($provincia->id == $request->provincia)
                                        <option value="{{ $provincia->id }}" selected>{{ $provincia->name }}</option>
                                    @else
				                        <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
				                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Mano</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="mano" value="{{ old('mano', $request->mano) }}">
                                <option value="" disabled selected>Seleccione la calidad del vehiculo</option>
                                @foreach($manos as $id => $nombre)
                                    @if($id == $request->mano)
                                        <option value="{{ $id }}" selected>{{ $nombre }}</option>
                                    @else
				                        <option value="{{ $id }}">{{ $nombre }}</option>
				                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Kilómetros</h6></div>
                     <div class="loction-search">
                         <span>De:</span>
                         <input type="text" value="{{ old('minKm', $request->minKm) }}" name="minKm" placeholder="Escriba mínimo de kilometros"/><br><br>
                         <span>A:</span>
                         <input type="text" value="{{ old('maxKm', $request->maxKm) }}" name="maxKm" placeholder="Escriba máximo de kilometros"/>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Precio</h6></div>
                     <div class="loction-search">
                         <span>De:</span>
                         <input type="text" value="{{ old('minPrecio', $request->minPrecio) }}" name="minPrecio" placeholder="Escriba mínimo de precio"/><br><br>
                         <span>A:</span>
                         <input type="text" value="{{ old('maxPrecio', $request->maxPrecio) }}" name="maxPrecio" placeholder="Escriba máximo de precio"/>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Caballos</h6></div>
                     <div class="loction-search">
                         <span>De:</span>
                         <input type="text" value="{{ old('minCv', $request->minCv) }}" name="minCv" placeholder="Escriba mínimo de CV"/><br><br>
                         <span>A:</span>
                         <input type="text" value="{{ old('maxCv', $request->maxCv) }}" name="maxCv" placeholder="Escriba máximo de CV"/>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Color</h6></div>
                     <div class="loction-search">
                         <input type="text" value="{{ old('color', $request->color) }}" name="color" placeholder="Escriba un color"/>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Cambio</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="cambio" value="{{ old('cambio', $request->cambio) }}">
                                <option value="" disabled selected>Seleccione cambio del vehiculo</option>
                                @foreach($cambios as $id => $nombre)
                                    @if($id == $request->cambio)
                                        <option value="{{ $id }}" selected>{{ $nombre }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Combustible</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="combustible" value="{{ old('combustible', $request->combustible) }}">
                                <option value="" disabled selected>Seleccione combustible del vehiculo</option>
                                @foreach($combustibles as $id => $nombre)
				                    @if($id == $request->combustible)
                                        <option value="{{ $id }}" selected>{{ $nombre }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Plazas</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="plazas" value="{{ old('plazas', $request->plazas) }}">
                                <option value="" disabled selected>Seleccione plazas del vehiculo</option>
                                @foreach($plazas as $id => $nombre)
				                    @if($id == $request->plazas)
                                        <option value="{{ $id }}" selected>{{ $nombre }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
                   
                   <div class="cs-search panel">
                        <div class="cs-filter-title"><h6>Puertas</h6></div>
                       <div class="select-input">
                         <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="puertas" value="{{ old('puertas', $request->puertas) }}">
                                <option value="" disabled selected>Seleccione puertas del vehiculo</option>
                                @foreach($puertas as $id => $nombre)
                                    @if($id == $request->puertas)
                                        <option value="{{ $id }}" selected>{{ $nombre }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endif
				                @endforeach
                         </select>
                       </div>
                   </div>
    			      
    			    <div class="card-header asaidFilter">
    					<input type="submit" class="btn col-lg-12 col-md-12 col-sm-12 col-xs-12" id="filtrar" value="Filtrar">
    				</div>
             </div>
          </aside>
          <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="auto-sort-filter">
                  <div class="auto-show-resuilt"><span>MOSTRANDO <em>{{ $cuenta }}</em> RESULTADOS DE SU BUSQUEDA</span></div>
                  <div class="auto-list">
                    <span>Ordenar por:</span>
                    <ul>
                      <li>
                       <div class="cs-select-post ordenarPor">
                         <select data-placeholder="Recent Added" class="chosen-select-no-single" tabindex="5" name="ordenado" id="ordenado">
                              <option value="anuncioNuevo">Anuncios más recientes</option>
                              <option value="anuncioAntiguo">Anuncios más antiguos</option>
                              <option value="cocheNuevo">Los más nuevos</option>
                              <option value="cocheAntiguo">Los más antiguos</option>
                          </select>
                       </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="auto-your-search">
                  <a href="{{ route('coches') }}" class="clear-tags cs-color">Limpiar filtros</a>
                </div>
              </div>
                <?php
                	$contador = 0;
                ?>
    			@foreach($coches as $coche)
                    @if($coche->causa=='nulo')
                    
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="auto-listing">
                                <div class="cs-media auto-media-slider">
                                    @if($coche->foto != null)
                						<figure>
                						    <img src="data:image/jpg;base64,{{ $coche->foto }}" alt="#"/>
                							<figcaption>
                								
                								@if($coche->destacado != null)
                								<span class="auto-featured">Destacado</span> 
                								@endif
                								
                								@if($coche->verificado != null)
                								<span class="auto-verified"><i class="icon-verified_user"></i> Verificado</span>
                								@endif
                								
                							</figcaption>
                						</figure>
                					@else
                						<figure>
                						    <img src="{{ url('assets/images/default-image.png') }}" alt="#"/>
                							<figcaption>
                								
                								@if($coche->destacado != null)
                								<span class="auto-featured">Destacado</span> 
                								@endif
                								
                								@if($coche->verificado != null)
                								<span class="auto-verified"><i class="icon-verified_user"></i> Verificado</span>
                								@endif
                								
                							</figcaption>
                						</figure>
                					@endif
                				</div>
                      
                                <div class="auto-text">
                                    <div class="post-title">
                		            	<h4><a href="{{url('show/vehiculo/' . $coche->id) }}">{{ $coche->titulo }}</a></h4>
                		            	<div class="auto-price"><span class="cs-color">{{ $coche->precio }} €</span> 
                		            	    @if($coche->precioFinanciado != null)
												<em>Financiado {{ $coche->precioFinanciado }} €</em>
											@endif
                		            	</div>
                		            </div>
                		            <ul class="auto-info-detail">
                		                <li>Año<span>{{ $años->where('id', $coche->anio_id)->first()->year }}</span></li>
                		                @if($coche->km != null)
    										<li>Kilometros<span>{{ $coche->km }}</span></li>
    									@else
    									    <li>Kilometros<span>-</span></li>
    									@endif
                		                <li>Cambio<span>{{ $coche->cambio }}</span></li>
                		                @if($coche->combustible != null)
    										<li>Combustible<span>{{ $coche->combustible }}</span></li>
    									@else
    									    <li>Combustible<span>-</span></li>
    									@endif
                		            </ul>
                		             <div class="btn-list botonMas">
                		               <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse" data-target="#list-view{{$contador}}"></a>
                		               <div id="list-view{{$contador}}" class="collapse">
                		                 <ul>
                		                    <li>Marca: {{ $marcas->where('id', $coche->marca_id)->first()->name }}</li>
                		                    <li>Modelo: {{ $modelos->where('id', $coche->modelo_id)->first()->name }}</li>
                		                    @if($coche->provincia_id != null)
												<li>Provincia: {{ $provincias->where('id', $coche->provincia_id)->first()->name }}</li>
											@endif
											@if($coche->mano != null)
												<li>Mano: {{ $coche->mano }}</li>
											@endif
											@if($coche->cv != null)
												<li>Caballos: {{ $coche->cv }} CV</li>
											@endif
                		                    @if($coche->color != null)
												<li>Color: {{ $coche->color }}</li>
											@endif
											@if($coche->plazas != null)
												<li>Plazas: {{ $coche->plazas }}</li>
											@endif
											@if($coche->puertas != null)
												<li>Puertas: {{ $coche->puertas }}</li>
											@endif
                		                 </ul>
                		               </div>
                		             </div>
                				    <a href="{{url('show/vehiculo/' . $coche->id) }}" class="View-btn">MÁS DETALLES<i class="icon-arrow-long-right"></i></a>
                		        </div>
                            </div>
                        </div>
                        
                        <?php
    	                	$contador = $contador + 1;
    	                ?>
                    @endif
                @endforeach
                <div class="cs-load-more">
                  	{{ $coches->appends($parametros)->onEachSide(5)->links() }}
                  </div>
                
                </div>
         </div>
         </form>
     </div>
   </div>
   
   <script type="text/javascript">
       $('#ordenado').on('change', function () {
            $('#filtrar').click();
        });
   </script>
   
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
   
 </div>

@endsection