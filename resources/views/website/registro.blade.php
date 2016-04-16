@extends('templates.website')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="registrate" method="POST">
					<div class="col s12">
						<img src="/imagenes/usuarionuevo.png">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>NUEVO USUARIO</b></label>
					</div>
					<img src="/imagenes/Sombra3.png" class="responsive-img">
					<div class="input-field col s12">
						<input type="text" class="validate" name="nombre" required>
						<label id="texto"><i class="fa fa-user"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="text" class="validate" name="usuario" required>
						<label id="texto"><i class="fa fa-star"></i>  Usuario: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="password" class="validate" name="password" required>
						<label id="texto"><i class="fa fa-key"></i>  Contraseña: </label>
				  	</div>
				  	<div class="col s12">
					    <div id="section" class="col s6">
					    	<a href="/acceder" id="boton2" class="waves-effect waves-light btn-large">
						  		<b>Cancelar  </b><i class="fa fa-ban"></i>
						  	</a>
					    </div>
					    <div id="section" class="col s6">
					    	<button  id="boton2" class="btn waves-effect waves-light" type="submit" name="action">
						    	<b>Guardar  </b><i class="fa fa-floppy-o"></i>
						  	</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</center>
</div>

@stop