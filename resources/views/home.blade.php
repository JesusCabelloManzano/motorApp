@extends('layouts.app')

@section('content')
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
				    
				    @if (session('update'))
	              		<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-checkmark"></i><span>   {{ session('update') }}</span>
						</div>
				    @endif
				    
				    @if (session('error'))
	              		<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-blocked"></i><span>   {{ session('error') }}</span>
						</div>
				    @endif
				    
	              </div>
	              
	              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            				<div class="cs-user-account-holder">
        						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        							<div class="cs-user-section-title">
        								<h4>Perfil</h4>
        							</div>
        						</div>
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
            									<div class="cs-browse-holder"><h6>Mi foto de perfil</h6></div>
            								</div>
            							</div>
            						</div>
            						<div class="cs-field-holder">
            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            								<label>Nombre de usuario</label>
            							</div>
            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            								<div class="cs-field">
            									<input type="text" placeholder="{{ Auth::user()->username }}" disabled>
            								</div>
            							</div>
            						</div>
            						<div class="cs-field-holder">
            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            								<label>Correo Electronico</label>
            							</div>
            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            								<div class="cs-field">
            									<input type="text" placeholder="{{ Auth::user()->email }}" disabled>
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
				            									@if(Auth::user()->name != null)
				            										<input type="text" placeholder="{{ Auth::user()->name }}" disabled>
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
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
				            									@if(Auth::user()->surname != null)
				            										<input type="text" placeholder="{{ Auth::user()->surname }}" disabled>
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
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
				            								<div class="cs-field">
				            									@if(!$country->isEmpty())
				            										<input type="text" placeholder="{{ Auth::user()->country->name }}" disabled>
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
				            								</div>
				            							</div>
            										</div>
            									</div>
            									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            										<div class="row">
            											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            								<label>Ciudad</label>
				            							</div>
				            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            								<div class="cs-field">
				            									@if(!$state->isEmpty())
				            										<input type="text" placeholder="{{ Auth::user()->state->name }}" disabled>
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
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
				            								<label>Localidad</label>
				            							</div>
				            							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            								<div class="cs-field">
				            									@if(!$city->isEmpty())
				            										<input type="text" placeholder="{{ Auth::user()->city->name }}" disabled>
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
				            								</div>
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
				            										@if(!$country->isEmpty())
				            											<input type="text" placeholder="+{{ Auth::user()->country->phonecode }}  -  {{ Auth::user()->phonenumber }}" disabled>
				            										@else
				            											<input type="text" placeholder="{{ Auth::user()->phonenumber }}" disabled>
				            										@endif
				            									@else
				            										<input type="text" placeholder="-" disabled>
				            									@endif
				            								</div>
				            							</div>
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
        					</div>
        				</div>
        			</div>
			</div>
		</div>
	</div>
</div>
@endsection