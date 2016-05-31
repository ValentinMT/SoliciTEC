@extends('templates.administrador')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="altaempleado" action="/actualizarEmp/update/{{$empleados->clave}}" method="POST" class="responsive-form">
					{{csrf_field()}}
					<div class="col s12">
						<img src="/imagenes/emp.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>EDITA EMPLEADO</b></label>
					</div>
					<img src="/imagenes/Sombra.png" class="responsive-img">
					<div class="input-field col s8">
						<input type="text" class="validate" name="nombre" required value="{{$empleados->nombre}}">
						<label id="texto"><i class="fa fa-user"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s4">
					    <select name="tipo">
					      <option value="{{$empleados->tipo}}" disabled selected>{{$empleados->tipo}}</option>
					      <option value="1">1 - Administrador</option>
					      <option value="2">2 - Jefe</option>
					      <option value="3">3 - Empleado</option>
					    </select>
					    <label id="texto">Tipo: </label>
					</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="imss" value="{{$empleados->imss}}">
						<label id="texto"><i class="fa fa-heartbeat"></i>  IMSS: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="RFC" required value="{{$empleados->RFC}}">
						<label id="texto"><i class="fa fa-list-alt"></i>  RFC: </label>
				  	</div>
				  	<div class="input-field col s12">
						<input type="text" class="validate" name="direccion" required value="{{$empleados->direccion}}">
						<label id="texto"><i class="fa fa-home"></i>  Dirección: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="telefono" value="{{$empleados->telefono}}">
						<label id="texto"><i class="fa fa-phone"></i>  Teléfono: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="celular" value="{{$empleados->celular}}">
						<label id="texto"><i class="fa fa-mobile"></i>  Celular: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="email" class="validate" name="email" value="{{$empleados->email}}">
						<label id="texto"><i class="fa fa-envelope"></i>  E-mail: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="password" class="validate" name="password" value="{{$empleados->password}}" disabled>
						<label id="texto"><i class="fa fa-key" aria-hidden="true"></i>  Password: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="fechaNacimiento" require value="{{$empleados->fechaNacimiento}}">
						<label id="texto"><i class="fa fa-calendar"></i>  Fecha de nacimiento: </label>
				  	</div>
				  	<div class="input-field col s6">
				  		<?php $depto = App\InsertarDepModel::all(); ?>
					    <select name="departamento_clave">
					    	<option value="{{$empleados->departamento_clave}}" disabled selected>{{$empleados->departamento_clave}}</option>
					    	@foreach($depto as $departamentos)
						    <option value="{{ $departamentos->clave }}">{{ $departamentos->clave }} - {{ $departamentos->nombre }}</option>
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