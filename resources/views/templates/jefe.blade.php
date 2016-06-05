<?php session_start() ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php $route = Route::current()->uri(); ?>
    @if($route == 'jefe/indexJefe') <?php $route = 'Panel Jefe' ?> @endif
    @if($route == 'jefe/empleados') <?php $route = 'Empleados' ?> @endif
    @if($route == 'acerca/jefe') <?php $route = 'Acerca' ?> @endif
    @if($route == 'quejasJefe') <?php $route = 'Ver Quejas' ?> @endif
    <title>{{ $route }}</title>
    <?php $route2 = Route::current()->uri(); ?>
    <meta id="token" name="token" value="{{ csrf_token() }}"> <!--Token de VUEJS-->
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>
    <link href='//fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/materialize.min.css"/>
    <link rel="stylesheet" href="/css/appSoliciTEC3.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--Para el alert - Para que no de errors-->
    <link rel="stylesheet" href="/css/sweetalert.css">
</head>

<body>
	<header>
		<nav class="green darken-1">
		    <div class="nav-wrapper">
		    	<a href="/jefe/indexJefe" class="brand-logo" style="margin-left: 20px">SoliciTEC  <i class="fa fa-file-text"></i></a>
		    	<a href="/jefe/indexJefe" data-activates="mobile-demo" class="button-collapse" style="margin-left: 20px"><i class="fa fa-bars"></i></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down">
		      		<li class=@if($route2 == 'solicitudes') {{'opcion-activa'}} @endif><a href="/solicitudes"><i class="fa fa-file-text"></i>  Solicitudes</a></li>
                	<li class=@if($route2 == 'quejasJefe') {{'opcion-activa'}} @endif><a href="/quejasJefe"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li class=@if($route2 == 'jefe/empleados') {{'opcion-activa'}} @endif><a href="/jefe/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li class=@if($route2 == 'acerca/jefe') {{'opcion-activa'}} @endif><a href="/acerca/jefe"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                    <li><a href="#!">{{ session()->get('jefe')->nombre }}</a></li>
                    <li><a href="/logoutJef" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Salir"><i class="fa fa-sign-out" aria-hidden="true"></i>  Salir</a></li>
			    </ul>
			    <ul class="side-nav" id="mobile-demo">
			        <li><a href="/solicitudes"><i class="fa fa-file-text"></i>  Solicitudes</a></li>
                	<li><a href="/quejasJefe"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li><a href="/jefe/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li><a href="/acerca/jefe"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                    <li><a href="/logoutJef"><i class="fa fa-sign-out" aria-hidden="true"></i>  Salir</a></li>
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
                	<li><a class="grey-text text-lighten-3" href="/solicitudes"><i class="fa fa-file-text"></i>  Solicitudes</a></li>
                	<li><a class="grey-text text-lighten-3" href="/quejasJefe"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li><a class="grey-text text-lighten-3" href="/jefe/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li><a class="grey-text text-lighten-3" href="/acerca/jefe"><i class="fa fa-question-circle"></i>  Acerca</a></li>
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
    <script src="/js/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/app.js"></script>
    <!--Para el alert-->    
    <script src="/js/sweetalert.min.js"></script>
    @include('sweet::alert') <!--Para incluir la clase alert-->
    <!--http://www.askjong.com/howto/notify-like-a-boss-with-sweet-alert-and-laravel-->
    @yield('scripts')
</body>

</html>