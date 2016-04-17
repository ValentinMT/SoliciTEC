@extends('templates.website')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<img src="/imagenes/acceso.png" class="responsive-img">
				<form id="form" action="/login" method="POST">
					{{csrf_field()}}
					<img src="/imagenes/Sombra3.png" class="responsive-img">
					<div class="input-field col s12">
						<input id="email" type="email" name="email" class="validate">
          				<label id="texto" for="email"><i class="fa fa-envelope"></i> Email</label>
				  	</div>
			       	<div class="input-field col s12">
					    <input id="password" type="password" name="password" class="validate">
          				<label id="texto" for="password"><i class="fa fa-key"></i> Password</label>
				    </div>
				    <!--<div id="section" class="col s12" align=left>
					    <div class="col s12">
					    	<input type="checkbox" id="test5"/>
					    	<label for="test5">  Recordar datos</label>
					    </div>
					    <div class="col s6">
					    	<a href="/registro" style="font-size: 14px; color: #43a047;"><link>
					    		<i class="fa fa-user-plus"></i>  Regístrate</link></a>
						</div>
					</div>-->
					<div id="section" class="col s12">
						<button id="boton3" class="btn waves-effect waves-light green darken-3" type="submit" name="action">
					  		<b>Iniciar Sesión</b> 
					  	</button>
					</div>
					<img src="/imagenes/Sombra3.png" class="responsive-img">
				</form>
			</div>
		</div>
	</center>
</div>

@stop