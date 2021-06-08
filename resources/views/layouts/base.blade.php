<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('assets/images/favicon-logo.png')}}"/>
    
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>motorApp</title>
    
    @yield('style')
    @yield('script')
    </head>
    
    <body class="wp-automobile">
    <div class="wrapper" id="wrapper"> 
    	<!-- Header Start -->
    	<header id="header">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
    					<div class="cs-logo">
    						<div class="cs-media">
    							<figure><a href="{{route('main')}}"><img src="{{url('assets/images/cs-logo.png')}}" alt="" /></a></figure>
    						</div>
    					</div>
    				</div>
    				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    					<div class="cs-main-nav pull-right">
    						<nav class="main-navigation">
    							<ul>
    								<li><a href="{{route('main')}}">Inicio</a></li>
    								<li><a href="{{route('coches')}}">Coches</a></li>
    								<!--<li><a href="about-us.html">About Us</a></li>-->
    								@guest
    								@else
        								@if(Auth::user()->rol != 'user')
        								    <li><a href="{{url('backend')}}">Backend</a></li>
        								@endif
        							@endguest
    								<!--<li><a href="#">Shop</a>
    									<ul>
    										<li><a href="shop-listing.html">Products</a></li>
    										<li><a href="shop-detail.html">Detail View</a></li>
    										<li><a href="shop-cart.html">Cart</a></li>
    										<li><a href="shop-checkout.html">Checkout</a></li>
    									</ul>
    								</li>-->
    								
    								<li class="cs-user-option">
    									<div class="cs-login">
    									    @guest
        									    <div class="cs-login-dropdown"> <a class="cs-login-dropdown-hover"><i class="icon-user2"></i> Mi cuenta <i class="icon-chevron-down2"></i></a>
                									<div class="cs-user-dropdown">
                										<ul>
                											<li><a href="{{ route('login') }}"><i class="cs-color icon-login"> </i>Inicia Sesión</a></li>
                											<li><a href="{{ route('register') }}"><i class="cs-color icon-create"> </i>Registrate</a></li>
                										</ul>
                									</div>
                								</div>
                                            @else
                                                <div class="cs-login-dropdown"> <a class="cs-login-dropdown-hover"><i class="icon-user2"></i> {{ Auth::user()->username }} <i class="icon-chevron-down2"></i></a>
                                                    <div class="cs-user-dropdown">
                                                        <div class="#">
                                                            <ul>
            													<li><a href="{{ route('home') }}">Perfil</a></li>
            													<li><a href="{{ route('user.coches') }}">Mis coches</a></li>
            													<li><a href="{{ route('coche.create') }}">Vender coche</a></li>
            													@if(Auth::user()->rol != 'user')
                                								    <li><a href="{{ route('register') }}">Registrar Usuario</a></li>
                                								@endif
            													<li><a class="dropdown-item" href="{{ route('logout') }}"
                                                                       onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                                                        {{ __('Cerrar Sesión') }}
                                                                    </a>
                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </li>
            												</ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endguest
    										<a class="cs-bgcolor btn-form" href="{{ route('coche.create') }}" aria-hidden="true"><i class="icon-plus"></i> Vender coche</a> 
    									</div>
    								</li>
    							</ul>
    						</nav>
                            <div class="cs-user-option hidden-lg visible-sm visible-xs">
    							<div class="cs-login">
    							    @guest
    								    <div class="cs-login-dropdown"> <a class="cs-login-dropdown-hover"><i class="icon-user2"></i> Mi cuenta <i class="icon-chevron-down2"></i></a>
        									<div class="cs-user-dropdown">
        										<ul>
        											<li><a href="{{ route('login') }}"><i class="cs-color icon-login"> </i>Inicia Sesión</a></li>
        											<li><a href="{{ route('register') }}"><i class="cs-color icon-create"> </i>Registrate</a></li>
        										</ul>
        									</div>
        								</div>
                                    @else
                                        <div class="cs-login-dropdown"> <a class="cs-login-dropdown-hover"><i class="icon-user2"></i> {{ Auth::user()->username }} <i class="icon-chevron-down2"></i></a>
                                            <div class="cs-user-dropdown">
                                                <div class="#">
                                                    <ul>
    													<li><a href="{{ route('home') }}">Perfil</a></li>
    													<li><a href="{{ route('user.coches') }}">Mis coches</a></li>
    													<li><a href="{{ route('coche.create') }}">Vender coche</a></li>
    													<li><a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                {{ __('Cerrar Sesión') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </li>
    												</ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endguest
    								<a class="cs-bgcolor btn-form" href="{{ route('coche.create') }}" aria-hidden="true"><i class="icon-plus"></i> Vender coche</a>  
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</header>
    	<!-- Header End --> 
    	
    	<!-- Single - Page Slider Start -->
    	<div class="cs-banner loader">
            @yield('single')
        </div>
    	<!-- Single - Page Slider End -->
    	
    	<!-- Main Start -->
    	<div class="main-section" id="main-section"> 
    		<!--Main Banner-->
    	    @yield('contenido')
    	</div>
    	<!-- Main End --> 
    	
    	<!-- Footer Start -->
    	<footer id="footer" style="background:#19171a;padding:32px 0 0">
    	    @yield('footer')
    	</footer>
    	<!-- Footer End --> 
    </div>
    
    @yield('postscript2')
    
    @yield('postscript')
    
    </body>

</html>