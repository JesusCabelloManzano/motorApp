@extends('backend.layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle">Perfil</h1>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-xl-3">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title mb-0">Perfil</h5>
					</div>
					<div class="card-body text-center">
					    @if( $user->profilepic != null )
		                	<img src="data:image/jpg;base64,{{ $user->profilepic }}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
		                @else
		                    <img src="{{ url('assets/images/defaultprofilepic.jpg') }}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
		                @endif
						@if( $user -> name != null && $user -> surname != null )
						    <h5 class="card-title mb-0">{{ $user->name }} {{ $user->surname }}</h5>
						@else
						    <h5 class="card-title mb-0">{{ $user->username }}</h5>
						@endif
						<div class="text-muted mb-2">{{ $user->rol }}</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-xl-9">
				<div class="card">
					<div class="card-header">

						<h5 class="card-title mb-0">Datos</h5>
					</div>
					<div class="card-body h-100">

						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Nombre de usuario: </strong> {{ $user->username }}<br />
							</div>
						</div>

						<hr />
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Email: </strong> {{ $user->email }}<br />
							</div>
						</div>

						<hr />
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Nombre: </strong> {{ $user->name }}<br />
							</div>
						</div>
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Apellidos: </strong> {{ $user->surname }}<br />
							</div>
						</div>
						
						<hr />
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>País: </strong>@if(!$country->isEmpty()) {{ $user->country->name }} @else - @endif<br />
							</div>
						</div>
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Ciudad: </strong> @if(!$state->isEmpty()) {{ $user->state->name }} @else - @endif<br />
							</div>
						</div>
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Localidad: </strong> @if(!$city->isEmpty()) {{ $user->city->name }} @else - @endif<br />
							</div>
						</div>

						<hr />
						
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<strong>Teléfono: </strong> 
								@if($user->phonenumber != null)
									@if(!$country->isEmpty())
										+{{ $user->country->phonecode }}  -  {{ $user->phonenumber }}
									@else
										{{ $user->phonenumber }}
									@endif
								@else
									-
								@endif
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection