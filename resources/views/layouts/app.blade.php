@extends('layouts.base')

@section('style')
<link href="{{url('assets/css/bootstrap.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/bootstrap-theme.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/iconmoon.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/chosen.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/style.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/cs-automobile-plugin.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/color.css')}}" rel="stylesheet">
<link href="{{url('assets/css/widget.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/responsive.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('assets/css/own-iconmoon.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('script')
<script src="{{ url('assets/scripts/jquery.js') }}"></script>
<script src="{{ url('assets/scripts/modernizr.js') }}"></script>
<script src="{{ url('assets/scripts/bootstrap.min.js') }}"></script>
@endsection

@section('single')
		@yield('banner')
@endsection

@section('contenido')
		@yield('content')
@endsection

@section('footer')
		<div class="cs-footer-widgets">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    						<div class="widget widget-our-partners">
    							<div class="widget-section-title">
    								<h6 style="color:#fff !important">Nuestros pratocinadores</h6>
    							</div>
    							<ul>
    								<li><a href="https://www.apartments.com/">Apartments.com</a></li>
    								<li><a href="https://www.cars.com/">Cars.com</a></li>
    								<li><a href="https://www.coches.net/">Coches.net</a></li>
    								<li><a href="https://informatica.ieszaidinvergeles.org:10001/laraveles/cocheApp/public/">IzvCochesNet</a></li>
    							</ul>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    						<div class="widget widget-categores">
    							<div class="widget-section-title">
    								<h6 style="color:#fff !important">Compre un coche</h6>
    							</div>
    							<ul>
    								<li><a href="#">Coches</a></li>
    							</ul>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    						<div class="widget widget-about-us">
    							<div class="widget-section-title">
    								<h6 style="color:#fff !important">Sobre nosotros</h6>
    							</div>
    							<ul>
    								<li><a href="#">Sobre nosotros</a></li>
    								<li><a href="#">Contacto</a></li>
    							</ul>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    						<div class="widget widget-news-letter">
    							<div class="widget-section-title">
    								<h6 style="color:#fff !important">Regístrese para novedades</h6>
    							</div>
    							<div class="cs-form">
    								<form>
    									<div class="input-holder">
    										<input type="email" placeholder="Escriba un correo valido">
    										<label> <i class="icon-send2"></i>
    											<input class="cs-bgcolor" type="submit" value="submit">
    										</label>
    									</div>
    								</form>
    							</div>
    							<div class="cs-social-media">
    								<ul>
    									<li><a href="#" data-original-title="facebook"><i class="icon-facebook-f"></i></a></li>
    									<li><a href="#" data-original-title="twitter"><i class="icon-twitter4"></i></a></li>
    									<li><a href="#" data-original-title="linkedin"><i class="icon-linkedin22"></i></a></li>
    									<li><a href="#" data-original-title="google"><i class="icon-google-plus"></i></a></li>
    									<li><a href="#" data-original-title="rss"><i class="icon-rss"></i></a></li>
    									<li><a href="#" data-original-title="vimeo"><i class="icon-vimeo"></i></a></li>
    								</ul>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="cs-copyright" style="background:#141215; padding-top:37px; padding-bottom:37px;">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    						<div class="copyright-text">
    							<p>Downloaded From <a href="https://templateshub.net" class="cs-color">Templates Hub</a> Built with Automobile</p>
    						</div>
    					</div>
    					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    						<div class="cs-back-to-top">
    							<address>
    							<i class="icon-phone"></i> <a href="#">+34 673-812-409</a>
    							</address>
    					</div>
    				</div>
    			</div>
    		</div>
@endsection

@section('postscript')
<script src="{{ url('assets/scripts/responsive.menu.js') }}"></script>
<script src="{{ url('assets/scripts/chosen.select.js') }}"></script>
<script src="{{ url('assets/scripts/slick.js') }}"></script>
<script src="{{ url('assets/scripts/echo.js') }}"></script>
<script src="{{ url('assets/scripts/functions.js') }}"></script>
@endsection