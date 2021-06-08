@extends('layouts.app')

@if($coche->foto!=null)
	@if(count($fotos) > 4)
		@section('banner')
		    <ul class="cs-banner-slider">
		    	@foreach($fotos as $foto)
			    	<li>
			        	<div class="cs-media">
			        		<figure><img data-echo="{{ asset(Storage::url($foto)) }}" src="{{ asset(Storage::url($foto)) }}" alt=""/></figure>
			            </div>
			        </li>
		        @endforeach
		    </ul>
		@endsection
	@endif
@endif

@section('content')
    <div class="page-section" style="box-shadow: 0 2px 3px -2px rgba(0,0,0,0.4);position:relative;">
    	<div class="container">
        	<div class="row">
            	<div class="custom-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            		@if($coche->foto!=null)
						@if(count($fotos) < 5)
							<div class="content-area">
								<ul class="blog-detail-slider" style="margin-bottom:30px;">
									@foreach($fotos as $foto)
										<li>
											<figure><img src="{{ asset(Storage::url($foto)) }}" alt="" /></figure>
										</li>
									@endforeach
								</ul>
							</div>
						@endif
					@else
					@endif
                	<div class="page-section">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="car-detail-heading">
                                    <div class="auto-text">
                                    	<h2>{{ $coche->titulo }}</h2>
                                        <span><i class="icon-user"></i>{{ $user->username }}</span>
                                        @if($coche->provincia_id != null)
                                        	<address><i class="icon-location"></i>{{ $provincia->name }}</address>
                                        @endif
                                    </div>
                                    <div class="auto-price"><span class="cs-color">{{ $coche->precio }} € </span>
										
										@if($coche->precioFinanciado != null)
                                    		<em> Financiado {{ $coche->precioFinanciado }} €</em>
                                    	@endif
                                    	
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="on-scroll">
									<div id="vehicle" class="auto-overview detail-content">
										<ul class="row">
											<li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="cs-media">
													<figure><i class="icon-calendar cs-color"></i></figure>
												</div>
												<div class="auto-text">
													<span>Año</span>
													<strong>{{ $año->year }}</strong>
												</div>
											</li>
											<li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="cs-media">
													<figure><i class="icon-vehicle92 cs-color"></i></figure>
												</div>
												<div class="auto-text">
													<span>Kilometros</span>
													<strong>{{ $coche->km }}</strong>
												</div>
											</li>
											<li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="cs-media">
													<figure><i class="icon-driving2 cs-color"></i></figure>
												</div>
												<div class="auto-text">
													<span>Cambio</span>
													<strong>{{ $coche->cambio }}</strong>
												</div>
											</li>
											<li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
												<div class="cs-media">
													<figure><i class="icon-gas20 cs-color"></i></figure>
												</div>
												<div class="auto-text">
													<span>Combustible</span>
													@if($coche->combustible != null)
														<strong>{{ $coche->combustible }}</strong>
													@else
														<strong>-</strong>
													@endif
												</div>
											</li>
										</ul>
										@if($coche->comentario != null)
                                    		<p class="more-text">
												{{ $coche->comentario }}
											</p>
                                    	@endif
									</div>
									<div id="specification" class="auto-specifications detail-content">
										<div class="section-title" style="text-align:left;">
											<h4>Especificaciones Técnicas</h4>
										</div>
										<ul class="row">
											<li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="element-title">
													<i class="cs-color icon-engine"></i>
													<span>Detalles de Modelo y Motor</span>
												</div>
											</li>
											<li class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
												<div class="specifications-info">
													<ul>
														<li>
															<span>Marca</span>
															<strong>{{ $marca->name }}</strong>
														</li>
														<li>
															<span>Año</span>
															<strong>{{ $año->year }}</strong>
														</li>
														<li>
															<span>Modelo</span>
															<strong>{{ $modelo->name }}</strong>
														</li>
														@if($coche->cv != null)
														<li>
															<span>Caballos</span>
															<strong>{{ $coche->cv }} CV</strong>
														</li>
														@endif
														<li>
															<span>Kilometros</span>
															<strong>{{ $coche->km }} KM</strong>
														</li>
													</ul>
												</div>
											</li>
										</ul>
										<ul class="row">
											<li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="element-title">
													<i class="cs-color icon-list"></i>
													<span>Más detalles</span>
												</div>
											</li>
											<li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="specifications-info">
													<ul>
														<li>
															<span>Color</span>
															<strong>{{ $coche->color }}</strong>
														</li>
														<li>
															<span>Plazas</span>
															@if($coche->plazas != null)
																<strong>{{ $coche->plazas }}</strong>
															@else
																<strong>-</strong>
															@endif
														</li>
													</ul>
												</div>
											</li>
											<li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="specifications-info">
													<ul>
														<li>
															<span>Mano</span>
															@if($coche->mano != null)
																<strong>{{ $coche->mano }}</strong>
															@else
																<strong>-</strong>
															@endif
														</li>
														<li>
															<span>Puertas</span>
															@if($coche->puertas != null)
																<strong>{{ $coche->puertas }}</strong>
															@else
																<strong>-</strong>
															@endif
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
									<div id="contact" class="cs-contact-form detail-content">
										 <div class="section-title">
											<h4 style="text-align:left;">Contacta con el Vendedor</h4>
										 </div>
										<form action="{{ route('coche.sendEmail') }}" method="POST">
											@csrf
											@method('put')
											<input type="text" name="iduser" value="{{ $user->id }}" hidden>
											<input type="text" name="idcoche" value="{{ $coche->id }}" hidden>
											
											<input type="text" name="name" placeholder="Su nombre" data-validate = "El nombre es obligatorio">
											@error('name')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											
											<input type="email" name="email" value="{{ $user->email }}" hidden>
											
											<input type="string" name="titulo" value="{{ $coche->titulo }}" hidden>
											
											<input type="email" name="yourEmail" placeholder="Su correo">
											@error('yourEmail')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input type="text" name="phone" placeholder="Su teléfono" data-validate = "El teléfono es obligatorio">
											@error('phone')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input type="text" name="subject" placeholder="Asunto del email" data-validate = "El asunto es obligatorio">
											@error('subject')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<textarea name="content" placeholder="Su Mensaje" data-validate = "El contenido del email es obligatorio"></textarea>
											@error('content')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										    <input type="submit" value="Enviar" class="cs-bgcolor">
										</form>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($coche->provincia_id != null)
	        <div class="page-section" style="margin-bottom:50px">
	            <div id="location" class="cs-map loader maps">
	                 <iframe height='450' src="https://www.google.com/maps/embed/v1/search?q=Provincia%20de%20{{ $provincia->name }}%2C%20Espa%C3%B1a&key=AIzaSyBAVecBoZqEGYc9KiJvHMX8TFKarHqxoN4">  </iframe>
	            </div>
	        </div>
        @endif
        
        <script type="text/javascript" src="{{ url('assets/scripts/show.js') }}"></script>
        
    </div>
@endsection