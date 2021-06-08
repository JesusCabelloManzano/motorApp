@extends('layouts.app')

@section('content')
@if(session('update'))
    <div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-info-with-circle"></i><span>Los datos del usuario se han modificado exitosamente.</span> 
    </div>
@endif
<div class="page-section">
   <div class="container">
     <div class="row">
          <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
	          	<ul id="sidebar-nav" class="hide--in-mobile sidebar-nav">
			        <li>
			            <a href="{{ route ('home') }}" class="user-name-a">
			            	<figure class="figure-profilepic"> 
				            	@if( Auth::user()->profilepic != null )
				                	<img src="data:image/jpg;base64,{{ Auth::user()->profilepic }}" id="user-sidebar-img" class="user-sidebar-profilepic"/>
				                @else
				                	<img src="{{ url('assets/images/defaultprofilepic.jpg') }}" id="user-sidebar-img" class="user-sidebar-profilepic"/>
				                @endif
			                </figure>
			                <span class="user-sidebar_name">{{ Auth::user()->username }}</span>
			            </a>
			        </li>
			        <li id="favorites">
			            <a href="{{ route ('user.edit') }}" id="_ctl0_ContentPlaceHolder1_Menu_lnkFavorites" class="sidebar_btn"><span class="icon-profile firstSpan"></span>Editar Perfil</a>
			        </li>
			        <li>
			            <a href="{{ route('user.coches') }}" id="_ctl0_ContentPlaceHolder1_Menu_lnkAlerts" class="sidebar_btn sidebar_btn3"><span class="icon-cars-motorapp"></span>Mis Coches</a>
			        </li>
			        <li class="u-relative">
			            <a href="{{ route('coche.create') }}" id="_ctl0_ContentPlaceHolder1_Menu_lnkMsgs" class="sidebar_btn"><span class="icon-car-motorapp firstSpan"></span> Vender Coche</a>
			        </li>
			         <li class="u-relative">
			         	<a class="sidebar_btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         												document.getElementById('logout-form').submit();">
                            <span class="icon-log-out firstSpan"></span> Cerrar Sesion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
			        </li>
			    </ul>
          </aside>
          <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              	
              	@if (session('status'))
              		<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="icon-warning3"></i><span>   {{ session('status') }}</span><a href="{{ route('verification.notice') }}"> Click, aqui!</a> 
					</div>
			    @endif

              </div>
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        				<div class="cs-user-account-holder">
    						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    							<div class="cs-user-section-title">
    								<h4>Editar Perfil</h4>
    							</div>
    						</div>
    						<form class="user-setting" method="POST" action="{{ url('user/update') }}" id="editUserForm" enctype="multipart/form-data">
                                @csrf
                                @method('put')
        						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        							<div class="cs-profile-pic">
        								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        									<div class="profile-pic">
        										<div class="cs-media">
        											<figure> 
            											@if( Auth::user()->profilepic != null )
										                	<img src="data:image/jpg;base64,{{ Auth::user()->profilepic }}" id="user-container-img" class="user-sidebar-profilepic"/>
										                @else
										                	<img src="{{ url('assets/images/defaultprofilepic.jpg') }}" id="user-container-img" class="user-sidebar-profilepic"/>
										                @endif
        											</figure>
        										</div>
        									</div>
        								</div>
        								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
											<div class="cs-browse-holder"> <h6>Mi foto de perfil</h6> 
												<span class="file-input btn-file"> Cambiar la foto <input type="file" id="profilepic" name="profilepic" class="profilepic" accept="image/*" onchange="readURL(this);"> </span>
											</div>
											@error('profilepic')
								            	<div class="alert alert-danger">{{ $message }}</div>
								            @enderror
										</div>
        							</div>
        						</div>
        						<div class="cs-field-holder">
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<label>Nombre de usuario</label>
        							</div>
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<div class="cs-field">
        								    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autofocus>
        									@error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        								</div>
        							</div>
        						</div>
        						<div class="cs-field-holder">
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<label>Correo Electronico</label>
        							</div>
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<div class="cs-field">
        								    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
        									@error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        								</div>
        							</div>
        						</div>
        						<div class="cs-field-holder">
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<div class="row">
        									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 field-margin-bottom-plus">
        										<div class="row">
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>Nombre</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<div class="cs-field">
			            									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Escriba su nombre">
			            									@error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
			            								</div>
			            							</div>
        										</div>
        									</div>
        									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        										<div class="row">
        											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>Apellidos</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<div class="cs-field">
			            									<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', $user->surname) }}" placeholder="Escriba su/s apellidos">
			            									@error('surname')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
			            								</div>
			            							</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<div class="cs-field-holder">
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<div class="row">
        									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 field-margin-bottom-plus">
        										<div class="row">
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>País</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <select data-placeholder="Seleccione su pais" tabindex="-1" class="chosen-select chosen-container" id="country-dd" name="country">
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
        										</div>
        									</div>
        									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        										<div class="row">
        											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>Ciudad</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            							    <select tabindex="1" class="chosen-select chosen-container" id="state-dd" name="state">
			            							    	@if($user->state_id == null)
                                                        		<option selected value="" disabled hidden>-</option>
                                                        	@else
                                                        		<option selected value="{{ $user->state_id }}" disabled hidden>{{ $user->state->name }}</option>
                                                        	@endif
			            							    	<option value="" disabled>Seleccione primero un país</option>
                                                        </select>
													</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<div class="cs-field-holder">
        							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    								<div class="row">
	    									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 field-margin-bottom-plus">
	    										<div class="row">
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>Localidad</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            							    <select tabindex="1" class="chosen-select chosen-container chosen-drop" id="city-dd" name="city">
			            							    	@if($user->city_id == null)
                                                        		<option selected value="" disabled hidden>-</option>
                                                        	@else
                                                        		<option selected value="{{ $user->city_id }}" disabled hidden>{{ $user->city->name }}</option>
                                                        	@endif
			            							    	<option value="" disabled>Seleccione primero una Ciudad</option>
	                                                    </select>
													</div>
	    										</div>
	    									</div>
	    									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	    										<div class="row">
	    											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<label>Número de teléfono</label>
			            							</div>
			            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            								<div class="cs-field">
			            									@if(Auth::user()->phonenumber != null)
			            										@if(!$countryName->isEmpty())
			            											<input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" placeholder="Escriba su número de telefono"></input>
			            										@else
			            											<input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" placeholder="Escriba su número de telefono">
			            										@endif
			            									@else
			            										<input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="" placeholder="Escriba su numero de telefono">
			            									@endif
			            									@error('phonenumber')
	                                                            <span class="invalid-feedback" role="alert">
	                                                                <strong>{{ $message }}</strong>
	                                                            </span>
	                                                        @enderror
			            								</div>
			            							</div>
	    										</div>
	    									</div>
	        							</div>
        							</div>
        						</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-seprator"></div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h6>Cambia la contraseña</h6>
									</div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label>Contraseña Antigua</label>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
											@error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label>Nueva Contraseña</label>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-field">
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
									</div>
								</div>
								<div class="cs-field-holder">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label>Confirma la contraseña</label>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-field">
											<input id="newpassword_confirmation" type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" name="newpassword_confirmation">
                                            @error('newpassword_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>
								</div>
        						<div class="cs-field-holder">
									<div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
										<div class="cs-field"><div class="cs-btn-submit"><input type="submit" value="Guardar"></div></div>
									</div>
								</div>
    						</form>
    			        </div>
    				</div>
    			</div>
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
    <script type="text/javascript" src="{{url('assets/scripts/image-change-profile.js')}}"></script>
@endsection