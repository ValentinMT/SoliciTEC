<?php session_start() ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
    <?php $route = Route::current()->uri(); ?>
    @if($route == 'administrador/indexAdministrador') <?php $route = 'Panel Administrador' ?> @endif
    @if($route == 'insertarDepto') <?php $route = 'Admon. Departamentos' ?> @endif
    @if($route == 'departamentos') <?php $route = 'Admon. Departamentos' ?> @endif
    @if($route == 'altadepartamentos') <?php $route = 'Alta Departamentos' ?> @endif
    @if($route == 'editarDepto/{clave}') <?php $route = 'Editar Departamento' ?> @endif
    @if($route == 'insertarEmp') <?php $route = 'Admon. Empleados' ?> @endif
    @if($route == 'empleados') <?php $route = 'Admon. Empleados' ?> @endif
    @if($route == 'altaempleados') <?php $route = 'Alta Empleados' ?> @endif
    @if($route == 'editarEmp/{clave}') <?php $route = 'Editar Empleado' ?> @endif
    @if($route == 'quejas') <?php $route = 'Admon. Quejas' ?> @endif
    @if($route == 'acerca/administrador') <?php $route = 'Acerca' ?> @endif
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
		    	<a href="/administrador/indexAdministrador" class="brand-logo" style="margin-left: 20px">SoliciTEC  <i class="fa fa-file-text"></i></a>
		    	<a href="/administrador/indexAdministrador" data-activates="mobile-demo" class="button-collapse" style="margin-left: 20px"><i class="fa fa-bars"></i></a>
		      	<ul id="nav-mobile" class="right hide-on-med-and-down">
		      		<li class=@if($route2 == 'solicitudes') {{'opcion-activa'}} @endif><a href="/solicitudes"><i class="fa fa-file-text"></i>  Solicitudes</a></li>
                	<li class=@if($route2 == 'quejas') {{'opcion-activa'}} @endif><a href="/quejas"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li class=@if($route2 == 'empleados') {{'opcion-activa'}} @endif><a href="/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li class=@if($route2 == 'departamentos') {{'opcion-activa'}} @endif><a href="/departamentos"><i class="fa fa-home"></i>  Departamentos</a></li>
                	<li class=@if($route2 == 'acerca/administrador') {{'opcion-activa'}} @endif><a href="/acerca/administrador"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<!--<li><a href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>-->
                    <li><a href="#!">{{ session()->get('administrador')->nombre }}</a></li>
                    <li><a href="/logoutAdm" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Salir"><i class="fa fa-sign-out" aria-hidden="true"></i>  Salir</a></li>
			    </ul>
			    <ul class="side-nav" id="mobile-demo">
			        <li><a href="/solicitudes"><i class="fa fa-file-text"></i>  Solicitudes</a></li>
                	<li><a href="/quejas"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li><a href="/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li><a href="/departamentos"><i class="fa fa-home"></i>  Departamentos</a></li>
                	<li><a href="/acerca/administrador"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<!--<li><a href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>-->
                    <li><a href="/logoutAdm"><i class="fa fa-sign-out" aria-hidden="true"></i>  Salir</a></li>
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
                	<li><a class="grey-text text-lighten-3" href="/quejas"><i class="fa fa-thumbs-down"></i>  Quejas</a></li>
                	<li><a class="grey-text text-lighten-3" href="/empleados"><i class="fa fa-users"></i>  Empleados</a></li>
                	<li><a class="grey-text text-lighten-3" href="/departamentos"><i class="fa fa-home"></i>  Departamentos</a></li>
                	<li><a class="grey-text text-lighten-3" href="/acerca/administrador"><i class="fa fa-question-circle"></i>  Acerca</a></li>
                	<!--<li><a class="grey-text text-lighten-3" href="/acceder"><i class="fa fa-sign-in"></i>  Acceder</a></li>-->
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