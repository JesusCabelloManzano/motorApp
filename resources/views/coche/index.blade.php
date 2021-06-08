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
							<i class="icon-warning3"></i><span>   {{ session('status') }}</span>
						</div>
				    @endif
				    
				    @if (session('store'))
	              		<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="icon-checkmark"></i><span>   {{ session('store') }}</span>
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
    			    
    				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    					<div class="cs-user-account-holder misCoches">
    						<div class="row">
    							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title">
                                        <h4>Mis vehiculos</h4>
                                        <form method="GET" name="orderBy" action="{{ url('coche/index') }}">
                                        	<ul>
	                                            <li><a href="#" class="cs-active-btn">Estado</a>
	    			  	                            <ul class="activo">
	    			  	                                <li><a onclick="document.getElementById('botonActivo').click()" onmouseover="this.style.cursor='pointer';">Activo</a></li> 
	    			  	                                <button id="botonActivo" value="activo" name="causa" style="display: none;"></button>
	    			  	                                <li><a onclick="document.getElementById('botonRetirado').click()" onmouseover="this.style.cursor='pointer';">Retirado</a></li>
	    			  	                                <button id="botonRetirado" value="retirado" name="causa" style="display: none;"></button>
	    			  	                            </ul>
	    		  	                            </li>
	                                          </ul>
                                        </form>
                                    </div>
                                </div>
                                  <ul class="cs-featurelisted-car" id="cs-featurelisted-car">
                                        @foreach($coches as $coche)
                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-media">
                                                    @if($coche->foto!=null)
                                                        <figure><a href="{{url('show/vehiculo/' . $coche->id) }}"><img src="data:image/jpg;base64,{{ $coche->foto }}" alt=""/></a></figure>
                                                    @else
                                                        <figure><a href="{{url('show/vehiculo/' . $coche->id) }}"><img src="{{ url('assets/images/default-image.png') }}" alt=""/></a></figure>
                                                    @endif
                                                </div>
                                                <div class="cs-text">
                                                    @if($coche->destacado!=null)
                                                        <span class="cs-featured">Destacado</span>
                                                    @endif
                                                    <h6><a href="{{url('show/vehiculo/' . $coche->id) }}">{{ $coche->titulo }}</a></h6>
                                                    <div class="post-options">
                                                        <span>Publicado: <em>{{ $coche->created_at->format('d/m/Y') }}</em></span>
                                                    </div>
                                                    <div class="cs-post-types">
                                                       <div class="cs-post-list">
                                                            <div class="cs-edit-post">
                                                            	<a href="{{url('coche/'. $coche->id . '/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="icon-edit2"></i></a>
                                                            	<!--<form action="{{ url('coche/' . $coche->id) }}" method="POST" enctype="multipart/form-data">
																@csrf
																@method('put')
	                                                                
	                                                                @if($coche->causa=='nulo')
	                                                                	<button name="retirar" value="retirar" id="retirar" hidden></button>
	                                                                    <a data-toggle="tooltip" data-placement="top" title="Retirar" onclick="document.getElementById('retirar').click()" onmouseover="this.style.cursor='pointer';"><i class="icon-cancel-circle"></i></a>
	                                                                @else
	                                                                	<button name="activar" value="nulo" id="activar" hidden></button>
	                                                                    <a data-toggle="tooltip" data-placement="top" title="Activar" onclick="document.getElementById('activar').click()" onmouseover="this.style.cursor='pointer';"><i class="icon-checkmark"></i></a>
	                                                                @endif
		                                                        </form>-->
                                                            </div>
                                                       </div>
                                                        @if($coche->causa!='nulo')
                                                        	<span class="cs-default-btn" style="color:#d00000; border:1px solid #d00000;">Retirado</span>
                                                        @else
                                                        	<span class="cs-default-btn" style="color:#4aa818; border:1px solid #4aa818;">Activo</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        
                                  </ul>
                                  <div class="cs-load-more">
                                  	{{ $coches->appends($parametros)->onEachSide(1)->links() }}
                                  </div>
        					</div>
        				</div>
        			</div>
    		    </div>
    		</div>
		</div>
	</div>
	
	<script type="text/javascript" src="{{ url('assets/scripts/script.js') }}"></script>
	
</div>
@endsection