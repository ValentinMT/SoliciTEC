@extends('templates.administrador')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="altaempleado" action="/insertarEmp" method="POST" class="responsive-form">
					{{csrf_field()}}
					<div class="col s12">
						<img src="/imagenes/emp.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>ALTA DE EMPLEADO</b></label>
					</div>
					<img src="/imagenes/Sombra.png" class="responsive-img">
					<div class="input-field col s8">
						<input type="text" class="validate" name="nombre" required placeholder="ej. José Valentín Maciel Torres">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. José Valentín Maciel Torres"><i class="fa fa-user"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s4">
					    <select name="tipo">
					      <option value="" disabled selected>Seleccionar...</option>
					      <option value="1">1. Administrador</option>
					      <option value="2">2. Jefe</option>
					      <option value="3">3. Empleado</option>
					    </select>
					    <label id="texto">Tipo: </label>
					</div>
				  	<div class="input-field col s6">
						<input onkeypress="return valida(event)" maxlength="11" type="text" class="validate" name="imss" placeholder="ej. 30038010705">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. 30038010705"><i class="fa fa-heartbeat"></i>  IMSS: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input maxlength="10" type="text" class="validate" name="RFC" required placeholder="ej. MATV930916">
						<label id="texto" class="tooltipped" data-position="right" data-delay="50" data-tooltip="ej. MATV930916"><i class="fa fa-list-alt"></i>  RFC: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="text" class="validate" name="direccion" required placeholder="ej. Pipila #106">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. Pipila #106"><i class="fa fa-home"></i>  Dirección: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input onkeypress="return valida(event)" maxlength="7" type="text" class="validate" name="telefono" placeholder="ej. 3155606">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. 3155606"><i class="fa fa-phone"></i>  Teléfono: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input onkeypress="return valida(event)" maxlength="10" type="text" class="validate" name="celular" placeholder="ej. 3121429626">
						<label id="texto" class="tooltipped" data-position="right" data-delay="50" data-tooltip="ej. 3121429626"><i class="fa fa-mobile"></i>  Celular: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="email" class="validate" name="email" placeholder="ej. 12460316@itcolima.edu.mx">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. 12460316@itcolima.edu.mx"><i class="fa fa-envelope"></i>  E-mail: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="password" class="validate" name="password" placeholder="ej. secret">
						<label id="texto"><i class="fa fa-key" aria-hidden="true"></i>  Password: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input maxlength="10" type="text" class="validate" name="fechaNacimiento" require placeholder="ej. 1993-09-16">
						<label id="texto" class="tooltipped" data-position="left" data-delay="50" data-tooltip="ej. 1993-09-16"><i class="fa fa-calendar"></i>  Fecha de nacimiento: </label>
				  	</div>
				  	<div class="input-field col s6">
				  		<?php $depto = App\InsertarDepModel::all(); ?>
					    <select name="departamento_clave">
					    	<option value="" disabled selected>Seleccionar...</option>
					    	@foreach($depto as $departamentos)
						    <option value="{{ $departamentos->clave }}">{{ $departamentos->clave }}. {{ $departamentos->nombre }}</option>
						    @endforeach
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

@section('scripts')
	<script>
		function valida(e){
		    tecla = (document.all) ? e.keyCode : e.which;

		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla==8){
		        return true;
		    }
		        
		    // Patron de entrada, en este caso solo acepta numeros
		    patron =/[0-9]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}
	</script>
@stop