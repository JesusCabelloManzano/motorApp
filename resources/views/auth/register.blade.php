@extends('layouts.app')

@section('content')
<div class="page-section">
    <div class="container">
        <div class="primerRow">
        	<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
        		<div class="cs-section-title" style="margin-bottom:20px;">
        			<h3 style="text-align:left;">MI CUENTA</h3>
        		</div>
        	</div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-register">
                	<h4>REGISTRATE</h4>
                	<div class="row">
                        <form method="POST" action="{{ route('register') }}">
                    	    @csrf
                    	    <div class="cs-field-holder">
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<label>Nombre Usuario *</label>
                    			</div>
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Escriba su nombre de usuario" autofocus>
                    			    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    			</div>
                    		</div>
                    		<div class="cs-field-holder">
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<label>Correo Electronico *</label>
                    			</div>
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Escriba su email">
                    				@error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    			</div>
                    		</div>
                    		@if(Auth()->user() != null)
                        		@if(Auth()->user()->rol == 'root')
                            		<div class="cs-field-holder">
                            			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            				<label>Rol</label>
                            			</div>
                            			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <select tabindex="2" class="chosen-select chosen-container @error('rol') is-invalid @enderror" id="rol" name="rol" value="{{ old('rol') }}">
            							    	<option value="" disabled>Selecciona un rol para el usuario</option>
            							    	<option value="root">Root</option>
            							    	<option value="advanced">Avanzado</option>
            							    	<option value="operator">Editor</option>
            							    	<option value="user" selected>Usuario</option>
                                            </select>
                                            @error('rol')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                            			</div>
                            		</div>
                            	@endif
                            @endif	
                    		<div class="cs-field-holder">
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<label>Contraseña</label>
                    			</div>
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="******" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    			</div>
                    		</div>
                    		<div class="cs-field-holder">
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<label>Confirma Contraseña *</label>
                    			</div>
                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    				<input id="password-confirm" type="password" class="form-control" placeholder="******" name="password_confirmation" required autocomplete="new-password">
                    			</div>
                    		</div>
                    		<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<div class="cs-btn-submit">
                    					<input type="submit" value="Registrarse" >
                    				</div>
    							</div>
    						</div>
                    	</form>
                    	<div class="modal-footer">
    						<div class="cs-user-signup"> 
    						    <i class="icon-user-plus2"></i> <strong>¿Ya tienes una cuenta? </strong> 
    						        <a href="{{ route('login') }}" class="cs-color" aria-hidden="true"> Inicia Sesión</a> 
    						</div>
    					</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection