@extends('layouts.appLogin')

@section('content')
<div class="page-section">
	   <div class="container">
	     <div class="primerRow">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="cs-signin">
					<h4>¡Hola!</h4>
					<div class="row">
					        
					    @if (session('resent'))
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    							<div class="alert alert-success alert-dismissable">
        							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        							<i class="icon-checkmark"></i><span>{{ __('Ha sido enviado un correo a su cuenta de correo electrónico.') }}</span>
        						</div>
        					</div>
                        @endif
                        
    						<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<label>Por favor, haz click en el botón de abajo para verificar su cuenta de correo electrónico</label>
    							</div>
    						</div>
    						<br>
    						
    						<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="cs-field-holder">
        							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        								<div class="cs-btn-submit">
        									<input type="submit" value="Reenviar correo de verificación">
        								</div>
        							</div>
        						</div>
                            </form>
                            <br>
                            
                            <div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<label>Si no te has creado ninguna cuenta, no tiene que hacer nada más.</label>
    							</div>
    						</div>
    						
    						<div class="cs-field-holder">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    								<label>Saludos</label>
    							</div>
    						</div>
    					</div>
				</div>
			</div>
        </div>
	</div>
</div>
@endsection
