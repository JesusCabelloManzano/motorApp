<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Buenas, este correo es de parte de la aplicación MotorApp, un usuario llamado: <strong>{!! $name !!}</strong>, esta interesado o quiere hablarle de su anuncio con titulo: <strong><u>{!! $titulo !!}</u></strong></div><br>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif
                    Su mensaje,<br>
                    {!! $content !!}
                 <br><br><div class="card-header"><strong>Los datos de contacto del interesado</strong> <br>
                                                 <strong>Nombre:</strong> {!! $name !!} <br>
                                                 <strong>Email:</strong> {!! $yourEmail !!} <br>
                                                 <strong>Teléfono:</strong> {!! $phone !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>