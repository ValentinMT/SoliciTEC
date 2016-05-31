@extends('templates.website')

@section('content')

<?php
$hoy =  date("d/m/Y");
?>

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="regsolicitud" method="POST" class="responsive-form">
					
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>SOLICITUD</b></label>
					</div>
					<img src="/imagenes/Sombra.png" class="responsive-img">
				  	<div class="input-field col s6">
				  		<label id="texto"></i>  Folio:  </label>
						<input type="text" class="validate" name="folio">
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="fecha"  readonly="readonly" value="<?php echo $hoy ?>">
						<label id="texto"></i>  Fecha: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="text" class="validate" name="nombre" required>
						<label id="texto">Nombre del empleado: </label>
				  	</div>
				  	<div class="input-field col s12">
				  		<select name="problema">
							<option value="1"> Vehiculares  </option>
							<option value="2"> Infraestructura </option>
							<option value="3"> Areas verdes </option>
						</select>
						<label id="texto"> Problema: </label>
				  	</div>
				  	<div class="input-field col s8">
						<select name="urgencia">
							<option value="1"> Baja  </option>
							<option value="2"> Media </option>
							<option value="3"> Alta  </option>
						</select>
						<label id="texto">  Urgencia: </label> 
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