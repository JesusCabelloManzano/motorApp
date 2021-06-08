@extends('backend.layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">
	
		<h1 class="h3 mb-3"><strong>Vehículos</strong></h1>
	
		<div class="row">
			<div class="col-12 col-lg-12 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
	
						<h5 class="card-title mb-0">Últimos vehículos publicados</h5>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
							    <th class="d-none d-xl-table-cell">Foto</th>
								<th class="d-none d-xl-table-cell">Título</th>
								<th class="d-none d-xl-table-cell">Marca</th>
								<th class="d-none d-xl-table-cell">Año</th>
								<th class="d-none d-xl-table-cell">Modelo</th>
								<th class="d-none d-xl-table-cell">Precio</th>
								<th class="d-none d-md-table-cell">Usuario</th>
								<th class="d-none d-xl-table-cell">Verificado</th>
								<th class="d-none d-xl-table-cell">Destacado</th>
								<th class="d-none d-xl-table-cell">Estado</th>
								<th class="d-none d-xl-table-cell">Ver</th>
								<th class="d-none d-xl-table-cell">Editar</th>
							</tr>
						</thead>
						<tbody>
						    @foreach($coches as $coche)
	    						<tr>
	    						    @if($coche->foto != null)
	    						        <td class="d-none d-xl-table-cell"><img src="data:image/jpg;base64,{{ $coche->foto }}" alt="#" style="width: 150px; height: 100px"/></td>
	    						    @else
	    						        <td class="d-none d-xl-table-cell"><img src="{{ url('assets/images/default-image.png') }}" alt="#" style="width: 150px; height: 100px"/></td>
	    						    @endif
	    						    <td class="d-none d-xl-table-cell">{{ $coche->titulo }}</td>
	    							<td class="d-none d-xl-table-cell">{{ $marcas->where('id', $coche->marca_id)->first()->name }}</td>
	    							<td class="d-none d-xl-table-cell">{{ $años->where('id', $coche->anio_id)->first()->year }}</td>
	    							<td class="d-none d-xl-table-cell">{{ $modelos->where('id', $coche->modelo_id)->first()->name }}</td>
	    							<td class="d-none d-md-table-cell">{{ $coche->precio }}</td>
	    							<td class="d-none d-md-table-cell">{{ $user->where('id', $coche->iduser)->first()->username }}</td>
	    							@if($coche->verificado == null)
	    							    <td class="d-none d-xl-table-cell"><span class="badge bg-danger">No</span></td>
	    							@else
	    							    <td class="d-none d-xl-table-cell"><span class="badge bg-success">Si</span></td>
	    							@endif
	    							@if($coche->destacado == null)
	    							    <td class="d-none d-md-table-cell"><span class="badge bg-danger">No</span></td>
	    							@else
	    							    <td class="d-none d-xl-table-cell"><span class="badge bg-success">Si</span></td>
	    							@endif
	    							@if($coche->causa == 'nulo')
	    							    <td class="d-none d-md-table-cell"><span class="badge bg-success">Activo</span></td>
	    							@else
	    							    <td class="d-none d-md-table-cell"><span class="badge bg-success">Retirado</span></td>
	    							@endif
	    							<td class="d-none d-md-table-cell"><a href="{{url('/backend/show/vehiculo/' . $coche->id) }}" class="btn btn-info btn-sm">Ver</a></td>
	    							<td class="d-none d-md-table-cell"><a href="{{url('backend/'. $coche->id . '/edit') }}" class="btn btn-info btn-sm">Editar</a></td>
	    						</tr>
	    					@endforeach
						</tbody>
					</table>
				</div>
			</div>
	
		</div>
	
	</div>
</main>
@endsection