@extends('backend.layouts.app')

@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Vehiculo</h1>
					</div>
					
					@if (session('status'))
	              		<div class="alert alert-info" role="alert">
							{{ session('error') }}
						</div>
				    @endif
				    
				    @if (session('update'))
	              		<div class="alert alert-success" role="alert">
							{{ session('error') }}
						</div>
				    @endif
				    
				    @if (session('error'))
					    <div class="alert alert-danger" role="alert">
							{{ session('error') }}
						</div>
				    @endif
					
					
					
					<div class="row">
						<div class="col-12 col-lg-12">
						    <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Usuario</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $user->username }}" disabled>
								</div>
								
								<div class="card-header">
									<h5 class="card-title mb-0">Título</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $coche->titulo }}" disabled>
								</div>
								
								<div class="card-header">
									<h5 class="card-title mb-0">Marca</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $marca->name }}" disabled>
								</div>
								
								<div class="card-header">
									<h5 class="card-title mb-0">Año</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $año->year }}" disabled>
								</div>
								
								<div class="card-header">
									<h5 class="card-title mb-0">Modelo</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $modelo->name }}" disabled>
								</div>
								
								@if($coche->mano != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Mano</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->mano }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Mano</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
    							@endif
								
								<div class="card-header">
									<h5 class="card-title mb-0">Precio</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $coche->precio }}" disabled>
								</div>
								
								@if($coche->precioFinanciado != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Precio Financiado</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->precioFinanciado }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Precio Financiado</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
    							@endif
								
								<div class="card-header">
									<h5 class="card-title mb-0">Kilómetros</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $coche->km }}" disabled>
								</div>
								
								@if($coche->cv != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Caballos</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->cv }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Caballos</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
    							@endif
    							
    							@if($coche->provincia_id != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Provincia</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $provincia->name }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Provincia</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
								@endif
    							
    							<div class="card-header">
									<h5 class="card-title mb-0">Color</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $coche->color }}" disabled>
								</div>
								
								@if($coche->combustible != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Combustible</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->combustible }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Combustible</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
								@endif
								
								<div class="card-header">
									<h5 class="card-title mb-0">Cambio</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" value="{{ $coche->cambio }}" disabled>
								</div>
								
								@if($coche->plazas != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Plazas</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->plazas }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Plazas</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
								@endif
								
								@if($coche->puertas != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Puertas</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="{{ $coche->puertas }}" disabled>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Puertas</h5>
    								</div>
    								<div class="card-body">
    									<input type="text" class="form-control" value="-" disabled>
    								</div>
								@endif
								
								@if($coche->comentario != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Comentario</h5>
    								</div>
    								<div class="card-body">
    									<textarea class="form-control" rows="5" placeholder="Textarea" disabled>{{ $coche->comentario }}</textarea>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Comentario</h5>
    								</div>
    								<div class="card-body">
    									<textarea class="form-control" rows="5" placeholder="Textarea" disabled>-</textarea>
    								</div>
								@endif
								
								@if($coche->foto != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Imagen Portada</h5>
    								</div>
    								<div class="card-body">
    									<img src="data:image/jpg;base64,{{ $coche->foto }}"></img>
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Imagen Portada</h5>
    								</div>
    								<div class="card-body">
    									<img src="{{ url('assets/images/default-image.png') }}" width="200px"></img>
    								</div>
								@endif
								
								@if($coche->comentario != null)
    								<div class="card-header">
    									<h5 class="card-title mb-0">Imagenes</h5>
    								</div>
    								<div class="card-body">
    								    @foreach($fotos as $foto)
    										<img src="{{ asset(Storage::url($foto)) }}" alt="" width="200px"/>
    									@endforeach
    								</div>
    							@else
    							    <div class="card-header">
    									<h5 class="card-title mb-0">Imagenes</h5>
    								</div>
    								<div class="card-body">
    									<span>-</span>
    								</div>
								@endif
								
						    </div>
						</div>
					</div>			
				</div>
			</main>
@endsection