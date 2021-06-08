@extends('backend.layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">
	
		<h1 class="h3 mb-3"><strong>Usuarios</strong></h1>
	
		
	
		<div class="row">
			<div class="col-12 col-lg-12 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
	
						<h5 class="card-title mb-0">Todos los usuarios</h5>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
							    <th class="d-none d-xl-table-cell">#ID</th>
								<th class="d-none d-xl-table-cell">Usuario</th>
								<th class="d-none d-xl-table-cell">Email</th>
								<th class="d-none d-xl-table-cell">Rol</th>
								<th class="d-none d-xl-table-cell">Coches</th>
								<th class="d-none d-xl-table-cell">Perfil</th>
								<th class="d-none d-xl-table-cell">Editar</th>
							</tr>
						</thead>
						<tbody>
						    @foreach($users as $user)
	    						<tr>
	    						    <td class="d-none d-xl-table-cell">{{ $user->id }}</td>
	    						    <td class="d-none d-xl-table-cell">{{ $user->username }}</td>
	    							<td class="d-none d-md-table-cell">{{ $user->email }}</td>
	    							<td class="d-none d-md-table-cell">{{ $user->rol }}</td>
	    							<td class="d-none d-md-table-cell"><a href="{{url('/backend/coches/' . $user->id) }}" class="btn btn-info btn-sm">Ver Coches</a></td>
	    							<td class="d-none d-md-table-cell"><a href="{{url('/backend/profile/' . $user->id) }}" class="btn btn-info btn-sm">Ver Perfil</a></td>
	    							<td class="d-none d-md-table-cell"><a href="{{url('/backend/user/' . $user->id . '/edit') }}" class="btn btn-info btn-sm">Editar Usuario</a></td>
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