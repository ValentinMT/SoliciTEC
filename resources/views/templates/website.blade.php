<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
    <?php $route = Route::current()->uri(); ?>
    @if($route == '/') <?php $route = 'SoliciTEC' ?> @endif
    @if($route == 'acceder') <?php $route = 'Iniciar Sesión' ?> @endif
    @if($route == 'acerca') <?php $route = 'Acerca' ?> @endif
    <title>{{ $route }}</title>
    <?php $route2 = Route::current()->uri(); ?>
    <link rel="stylesheet" href="/css/materialize.min.css"/>
	<link rel="stylesheet" href="/css/appSoliciTEC5.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--Para el alert - Para que no de errors-->
    <link rel="stylesheet" href="/css/sweetalert.css">
</head>

<body>
	<header>
		<nav class="green darken-1">
		    <div class="nav-wrapper">
		    	<a href="/" class="brand-logo" style="margin-left: 20px">SoliciTEC  <i class="fa fa-file-text"></i></a>
		    	<a href="/" data-activates="mobile-demo" class="button-collapse" style="margin-left: 20px"><i class="fa fa-bars"></i></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down">
                	<li class=@if($route2 == 'acerca') {{'opcion-activa'}} @endif><a href="/acerca"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<li class=@if($route2 == 'acceder') {{'opcion-activa'}} @endif><a href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>
			    </ul>
			    <ul class="side-nav" id="mobile-demo">
                	<li><a href="/acerca"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<li><a href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>
			    </ul>
		    </div>
		</nav>
	</header>

	@yield('content')

	<footer class="page-footer grey darken-3">
        <div class="container">
        	<div class="row">
            	<div class="col l6 s12">
                	<h5 class="white-text">
                		SoliciTEC <i class="fa fa-file-text"></i>
                	</h5>
                	<p class="grey-text text-lighten-4">Reporta los problemas que detectes y tu jefe de departamento se encargará del resto.</p>
              	</div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Enlaces</h5>
                <ul>
                	<li><a class="grey-text text-lighten-3" href="/acerca"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<li><a class="grey-text text-lighten-3" href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>
                </ul>
            </div>
        </div>
        </div>
        	<div class="footer-copyright grey darken-4">
            	<div class="container">
            		© 2016 - SoliciTEC
            		<a class="grey-text text-lighten-4 right btn-social" href="#!"><i class="fa fa-twitter-square"></i></a>
            		<a class="grey-text text-lighten-4 right btn-social" href="#!"><i class="fa fa-facebook-square"></i></a>
            	</div>
          	</div>
    </footer>

	<script src="/js/jquery-2.2.1.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<script src="/js/app.js"></script>
    <!--Para el alert-->    
    <script src="/js/sweetalert.min.js"></script>
    @include('sweet::alert') <!--Para incluir la clase alert-->
    <!--http://www.askjong.com/howto/notify-like-a-boss-with-sweet-alert-and-laravel-->
    @yield('scripts')
</body>

</html>