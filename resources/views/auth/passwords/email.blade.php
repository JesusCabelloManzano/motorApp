@extends('layouts.appLogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="modal" id="user-forgot-pass" tabindex="-1" role="dialog">
        	<div class="modal-dialog" role="document">
        	    <form method="POST" action="{{ route('password.email') }}">
                @csrf
            	    <div class="modal-content">
            	        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    					<div class="modal-body">
    						<h4>Recupere su contraseña</h4>
    						<div class="cs-recover-password-form">
    							<form>
    								<div class="input-holder">
    									<label for="email"> <strong>Email</strong> <i class="icon-envelope"></i>
    										<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Escriba el email de su cuenta">
    									</label>
    									@error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
    								</div>
    								<div class="input-holder">
    									<input class="cs-color csborder-color" type="submit" value="Enviar">
    								</div>
    							</form>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<div class="cs-user-signup"> 
    						    <i class="icon-user-plus2"></i> <strong>¿Se ha acordado de la contraseña? </strong> 
    						        <a href="{{ route('login') }}" class="cs-color" aria-hidden="true">Iniciar Sesión</a> 
    						</div>
    					</div>
    				</div>
    			</form>
        	</div>
        </div>
    </div>
</div>
@endsection
