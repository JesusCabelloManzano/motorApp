<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	
    <link rel="icon" type="image/png" href="{{url('assets/images/favicon-logo.png')}}"/>
    
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>motorApp Admin</title>
    
    @yield('style')
    @yield('script')
    </head>
    
    <body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
			    
				<a class="sidebar-brand" href="{{url('backend')}}">
                  <span class="align-middle">motorApp</span>
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Usuario
					</li>
                    
                    @guest
                        <li class="sidebar-item">
    						<a class="sidebar-link" href="{{ route('login') }}">
                              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Iniciar Sesión</span>
                            </a>
    					</li>
    					
    					<li class="sidebar-header">
							Páginas
						</li>
    					
    					<li class="sidebar-item">
    						<a class="sidebar-link" href="{{ route('main') }}">
                              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Página Principal</span>
                            </a>
    					</li>
                    @else
                        <li class="sidebar-item">
    						<a class="sidebar-link" href="{{url('/backend/profile/' . Auth::user()->id) }}">
                              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Perfil</span>
                            </a>
    					</li>
    					
    					<li class="sidebar-item">
    						<a class="sidebar-link" href="{{ route('register') }}">
                              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Registrar Usuario</span>
                            </a>
    					</li>
    					
    					<li class="sidebar-header">
							Páginas
						</li>
	
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('backend')}}">
	                          <i class="align-middle" data-feather="menu"></i> <span class="align-middle">Coches</span>
	                        </a>
						</li>
	
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{route('backend.users')}}">
	                          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuarios</span>
	                        </a>
						</li>
						
						<li class="sidebar-item">
    						<a class="sidebar-link" href="{{ route('main') }}">
                              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Página Principal</span>
                            </a>
    					</li>
                    @endguest
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                  <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            @guest
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"><span class="text-dark">Iniciar Sesión</span></a>
                            @else
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    @if( Auth::user()->profilepic != null )
    				                	<img src="data:image/jpg;base64,{{ Auth::user()->profilepic }}" class="avatar img-fluid rounded me-2" alt="{{ Auth::user()->username }}" /> 
    				                @else
    				                    <img src="{{ url('assets/images/defaultprofilepic.jpg') }}" class="avatar img-fluid rounded me-2" alt="{{ Auth::user()->username }}" /> 
    				                @endif
                                    <span class="text-dark">{{ Auth::user()->username }}</span>
                                </a>
    							<div class="dropdown-menu dropdown-menu-end">
    								<a class="dropdown-item" href="{{url('/backend/profile/' . Auth::user()->id) }}"><i class="align-middle me-2" data-feather="user"></i> Perfil</a>
    								<a class="dropdown-item" href="{{url('/backend/coches/' . Auth::user()->id) }}"><i class="align-middle me-2" data-feather="truck"></i>Mis Coches</a>
    								<div class="dropdown-divider"></div>
    								<a class="dropdown-item" href="{{ route('logout') }}"
                                                                       onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
    									<i class="align-middle me-2" data-feather="log-out"></i>Log out</a>
    								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    							</div>
                            @endguest
							
						</li>
					</ul>
				</div>
			</nav>

			@yield('contenido')

			<footer class="footer">
			    @yield('footer')
			</footer>
		</div>
	</div>

	@yield('postscript')

</body>

</html>