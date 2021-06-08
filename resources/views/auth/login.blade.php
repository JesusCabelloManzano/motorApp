@extends('layouts.appLogin')

@section('content')
<div class="page-section">
    <div class="container">
        <div class="primerRow">
            
        	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        	    
        	    @if (session('status'))
              		<div class="alert alert-info alert-dismissable">
    					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    					<i class="icon-info-with-circle"></i><span>   {{ session('status') }}</span>
    				</div>
    		    @endif
        	    
        		<div class="cs-section-title" style="margin-bottom:20px;">
        			<h3 style="text-align:left;">MI CUENTA</h3>
        		</div>
        	</div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="cs-signin">
					<h4>INCIAR SESIÓN</h4>
					<div class="row">
    					<form method="POST" action="{{ route('login') }}">
    					    @csrf
    						<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<label>Correo Electronico *</label>
    							</div>
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    							    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Escriba su email" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    							</div>
    						</div>
    						<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<label>Contraseña *</label>
    							</div>
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    							    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    							</div>
    						</div>
    						<div class="cs-field-holder">
        						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        							<div class="cs-checkbox">
        								<input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        								<label for="remember">Recuérdame</label>
        							</div>
    							</div>
    						</div>
    						<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<div class="cs-btn-submit">
    									<input type="submit" value="Iniciar Sesión">
    								</div>
    								@if (Route::has('password.request'))
    								    <a href="{{ route('password.request') }}" class="cs-forgot-password"><i class="cs-color icon-help-with-circle"></i>¿Se te olvidó la contraseña? </a>
                                    @endif
    							</div>
    						</div>
    					</form>
    					<div class="modal-footer">
    						<div class="cs-user-signup"> 
    						    <i class="icon-user-plus2"></i> <strong>¿No tiene cuenta todavía?  </strong> 
    						        <a href="{{ route('register') }}" class="cs-color" aria-hidden="true"> Registrate</a> 
    						</div>
    					</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection