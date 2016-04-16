@extends('templates.website')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="altaempleado" method="POST" class="responsive-form">
					<div class="col s12">
						<img src="/imagenes/emp.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>ALTA DE EMPLEADOS</b></label>
					</div>
					<img src="/imagenes/Sombra.png" class="responsive-img">
					<div class="input-field col s12">
						<input type="text" class="validate" name="nombre" required>
						<label id="texto"><i class="fa fa-user"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="imss">
						<label id="texto"><i class="fa fa-heartbeat"></i>  IMSS: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="RFC" required>
						<label id="texto"><i class="fa fa-list-alt"></i>  RFC: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="text" class="validate" name="direccion" required>
						<label id="texto"><i class="fa fa-home"></i>  Dirección: </label>
				  	</div>
				  	<div class="input-field col s4">
						<input type="text" class="validate" name="telefono">
						<label id="texto"><i class="fa fa-phone"></i>  Teléfono: </label>
				  	</div>
				  	<div class="input-field col s4">
						<input type="text" class="validate" name="celular">
						<label id="texto"><i class="fa fa-mobile"></i>  Celular: </label>
				  	</div>
				  	<div class="input-field col s4">
						<input type="email" class="validate" name="e-mail">
						<label id="texto"><i class="fa fa-envelope"></i>  E-mail: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="fechaNacimiento" require>
						<label id="texto"><i class="fa fa-calendar"></i>  Fecha de nacimiento: </label>
				  	</div>
				  	<div class="input-field col s6">
					    <select>
					    	<option value="" disabled selected>Seleccionar...</option>
						    <option value="1">Sistemas</option>
						    <option value="2">Administración</option>
						    <option value="3">Industrial</option>
					    </select>
					    <!--<input type="text" class="validate" name="departamento_clave"required>-->
					    <label id="texto"><i class="fa fa-suitcase"></i>  Departamento: </label>
					</div>
				  	<div class="col s12">
					    <div id="section" class="col s6">
						  	<a href="/empleados" id="boton2" class="waves-effect waves-light btn-large">
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