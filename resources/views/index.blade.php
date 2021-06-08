@extends('layouts.app')

@section('content')
<!--tabs section-->
		<div class="page-section" style="padding-bottom:65px; margin-bottom: 0px">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 co-sm-12 col-xs-12"><!--Element Section Start-->
								<div class="cs-section-title">
									<h3 style="text-transform:uppercase !important; margin-bottom: 0px;">¡Los mejores coches para ti!</h3>
								</div>
								<!--Tabs Start-->
								<div class="cs-tabs full-width">
									<form method="GET" name="orderBy" action="{{ url('/') }}">
										<ul class="nav nav-tabs">
											<li><a data-toggle="tab" onclick="document.getElementById('botonNuevas').click()" onmouseover="this.style.cursor='pointer';" style="color: black">Nuevas Publicaciones</a></li>
											<button id="botonNuevas" style="display: none;"></button>
											
											<li><a data-toggle="tab" onclick="document.getElementById('botonUsados').click()" onmouseover="this.style.cursor='pointer';" style="color: black">Coches Usados</a></li>
											<button id="botonUsados" value="usado" name="mano" style="display: none;"></button>
											
											<li><a data-toggle="tab" onclick="document.getElementById('botonDestacados').click()" onmouseover="this.style.cursor='pointer';" style="color: black">Coches Destacados</a></li>
											<button id="botonDestacados" value="destacado" name="destacado" style="display: none;"></button>
											
											<li><a data-toggle="tab" onclick="document.getElementById('botonVerificados').click()" onmouseover="this.style.cursor='pointer';" style="color: black">Coches Verificados</a></li>
											<button id="botonVerificados" value="verificado" name="verificado" style="display: none;"></button>
										</ul>
									</form>
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
											<div class="row">
												<?php
								                	$contador = 0;
								                ?>
												@foreach($coches as $coche)
									                @if($coche->causa=='nulo' || $coche->causa=='null')
										                
									                	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
															<div class="auto-listing auto-grid">
																<div class="cs-media">
																	@if($coche->foto != null)
																		<figure><img src="data:image/jpg;base64,{{ $coche->foto }}" alt="#"/>
																			<figcaption>
																				
																				@if($coche->destacado == 1)
																				<span class="auto-featured">Destacado</span> 
																				@endif
																				
																				@if($coche->verificado == 1)
																				<span class="auto-verified"><i class="icon-verified_user"></i> Verificado</span>
																				@endif
																				
																			</figcaption>
																		</figure>
																	@else
																		<figure><img src="{{ url('assets/images/default-image.png') }}" alt="#"/>
																			<figcaption>
																				
																				@if($coche->destacado == 1)
																				<span class="auto-featured">Destacado</span> 
																				@endif
																				
																				@if($coche->verificado == 1)
																				<span class="auto-verified"><i class="icon-verified_user"></i> Verificado</span>
																				@endif
																				
																			</figcaption>
																		</figure>
																	@endif
																</div>
																<div class="auto-text"> <span class="cs-categories">{{ $users->where('id', $coche->iduser)->first()->username }}</span>
																	<div class="post-title">
																		<h6><a href="{{url('show/vehiculo/' . $coche->id) }}">{{ $coche->titulo }}</a></h6>
																		<div class="auto-price"><span class="cs-color">{{ $coche->precio }} €</span> 
																			@if($coche->precioFinanciado != null)
																				<em>{{ $coche->precioFinanciado }} €</em>
																			@endif
																		</div>
																	</div>
																	<div class="btn-list"> <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse" data-target="#list-view{{$contador}}"></a>
																		<div id="list-view{{$contador}}" class="collapse">
																			<ul>
																				<li>Marca: {{ $marcas->where('id', $coche->marca_id)->first()->name }}</li>
																				<li>Año: {{ $años->where('id', $coche->anio_id)->first()->year }}</li>
																				<li>Modelo: {{ $modelos->where('id', $coche->modelo_id)->first()->name }}</li>
																				@if($coche->provincia_id != null)
																					<li>Provincia: {{ $provincias->where('id', $coche->provincia_id)->first()->name }}</li>
																				@endif
																				@if($coche->km != null)
																					<li>Kilómetros: {{ $coche->km }} KM</li>
																				@endif
																				@if($coche->cv != null)
																					<li>Caballos: {{ $coche->cv }} CV</li>
																				@endif
																			</ul>
																		</div>
																	</div>
																	<a href="{{url('show/vehiculo/' . $coche->id) }}" class="View-btn">Más detalles<i class=" icon-arrow-long-right"></i></a> </div>
															</div>
														</div>
														<?php
										                	$contador = $contador + 1;
										                ?>
									                @endif
									            @endforeach
											</div>
										</div>
									</div>
								</div>
								<!--Tabs End--> 
								<!--Element Section End-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
