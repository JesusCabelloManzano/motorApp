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
                <form class="user-setting" method="POST" action="{{ url('backend/user/' . $user->id) }}" id="editUserForm" enctype="multipart/form-data">
				@csrf
				@method('put')
					<div class="card-header">
						<h5 class="card-title mb-0">Apodo</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required>
					</div>
					@error('username')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
		            
		            <div class="card-header">
						<h5 class="card-title mb-0">Email</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
					</div>
					@error('email')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
		            
		            <div class="card-header">
						<h5 class="card-title mb-0">Nombre</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
					</div>
					@error('name')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
		            
		            <div class="card-header">
						<h5 class="card-title mb-0">Apellido</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', $user->surname) }}">
					</div>
					@error('surname')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Pais</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('country_id') is-invalid @enderror" name="country_id" id="country-dd" value="{{ old('country_id', $user->country_id) }}">
                            @if($user->country_id == null)
                        		<option selected value="" disabled>Seleccione su país</option>
                        	@endif
                            @foreach($countries as $data)
                                @if($data->id == old('country_id', $user->country_id))
                                    <option selected value="{{ $data->id }}">{{ $data->name }}</option>
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
						<h5 class="card-title mb-0">Ciudad</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('state_id') is-invalid @enderror" name="state_id" id="state-dd" value="{{ old('state_id', $user->state_id) }}">
							@if($user->state_id == null)
								<option value="" disabled>Seleccione primero un país</option>
                        		<option selected value="" selected disabled>Seleccione una ciudad</option>
                        	@else
                        		<option selected value="{{ old('state_id', $user->state_id) }}">{{ $user->state->name }}</option>
                        	@endif
                        </select>
					</div>
					@error('state_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Localidad</h5>
					</div>
					<div class="card-body">
						<select class="form-select mb-3 @error('city_id') is-invalid @enderror" name="city_id" id="city-dd" value="{{ old('city_id', $user->city_id) }}">
							<option value="" disabled>Seleccione primero una Ciudad</option>
							@if($user->city_id == null)
                        		<option value="" disabled>Seleccione primero una ciudad</option>
                        		<option selected value="" selected disabled>Seleccione una localidad</option>
                        	@else
                        		<option selected value="{{ old('city_id', $user->city_id) }}">{{ $user->city->name }}</option>
                        	@endif
                        </select>
					</div>
					@error('city_id')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					<div class="card-header">
						<h5 class="card-title mb-0">Número de teléfono</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}">
					</div>
					@error('phonenumber')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
		            
		            <div class="card-header">
						<h5 class="card-title mb-0">Rol</h5>
					</div>
					<div class="card-body">
					    <select class="form-select mb-3 @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol', $user->rol) }}">
					        @foreach($roles as $rol => $nombre)
                                @if($rol == old('rol', $user->rol))
                                    <option selected value="{{ $rol }}">{{ $nombre }}</option>
                                @else
                                    <option value="{{ $rol }}">{{ $nombre }}</option>
                                @endif
                            @endforeach
					    </select>
					</div>
					@error('phonenumber')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					
					<div class="card-header">
						<h5 class="card-title mb-0">Cambia la contraseña</h5>
					</div>

                    <div class="card-header">
						<h5 class="card-title mb-0">Contraseña Antigua</h5>
					</div>
					<div class="card-body">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					
					<div class="card-header">
						<h5 class="card-title mb-0">Nueva Contraseña</h5>
					</div>
					<div class="card-body">
						<input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword">
                        <!-- si hay más de un error, mostrar todos -->
                        @if ($errors->has('newpassword'))
                            <span class="invalid-feedback" role="alert">
                            @foreach($errors->get('newpassword') as $error)
                                <strong>{{ $error }}</strong><br>
                            @endforeach
                            </span>
                        @endif
					</div>

                    <div class="card-header">
						<h5 class="card-title mb-0">Confirma la contraseña</h5>
					</div>
					<div class="card-body">
						<input id="newpassword_confirmation" type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" name="newpassword_confirmation">
                        @error('newpassword_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="cs-browse-holder"> <h6>Mi foto de perfil</h6> 
						<span class="file-input btn-file"> Cambiar la foto <input type="file" id="profilepic" name="profilepic" class="profilepic" accept="image/*" onchange="readURL(this);"> </span>
					</div>
					<br>
					@error('profilepic')
		            	<div class="alert alert-danger">{{ $message }}</div>
		            @enderror
					
					@if( $user->profilepic != null )
	                	<img src="data:image/jpg;base64,{{ $user->profilepic }}" id="user-container-img" class="user-sidebar-profilepic" width="200px"/>
	                @else
	                	<img src="{{ url('assets/images/defaultprofilepic.jpg') }}" id="user-container-img" class="user-sidebar-profilepic" width="200px"/>
	                @endif
					
					<div class="card-header">
						<input type="submit" class="btn btn-primary btn-lg" value="Guardar">
					</div>
				</form>
			    </div>
			</div>
		</div>			
	</div>
				
	<script src="{{ url('assets/scripts/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function () {
        	$('#country-dd').on('click', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Seleccione su ciudad</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Seleccione su ciudad</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Seleccione su localidad</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    
    <script type="text/javascript" src="{{url('assets/backend/js/image-change-profile.js')}}"></script>
				
</main>
@endsection