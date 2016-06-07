@extends('templates.empleado')

@section('content')
	<?php
		$hoy =  date("Y/m/d");
	?>

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form action="/insertarQueja" method="POST" id="regqueja" class="responsive-form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col s12">
						<img src="/imagenes/SugQueRec.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 25px; color: #43a047;"><b>REALIZAR QUEJA</b></label>
					</div>
					<img src="/imagenes/Sombra.png" class="responsive-img">				  
				  	<div class="input-field col s12">
						<input type="hidden" class="validate" name="fecha" readonly="readonly" value="{{$hoy}}">
						<label id="texto">Fecha: {{$hoy}}</label>
						<br><br><br>
				  	</div>
				  	<div class="input-field col s8">
				  		<?php 
				  			$empNom = session()->get('empleado')->nombre;
				  			$empClave = session()->get('empleado')->clave;
				  		?>
				  		<input type="text" value="{{$empNom}}"  readonly="readonly" >
						<input type="hidden" class="validate" name="empleado_clave" value="{{$empClave}}">
						<label id="texto">Nombre del Empleado que envía:</label> 
				  	</div>
				  	<div class="input-field col s4">
				  		<?php
				  			$depClave = session()->get('empleado')->departamento_clave;
				  			$nom=\DB::table('empleado as E')
					            ->join('departamento as D', 'E.departamento_clave', '=', 'D.clave')
					            ->where('D.clave', '=', $depClave)
					            ->select('D.nombre')
					            ->first();
				  		?>
				  		<input type="hidden" name="empleado_departamento_clave" value="{{$depClave}}">
						<input type="text" value="{{$depClave}}. {{$nom->nombre}}" readonly="readonly">
						<label id="texto">Departamento origen:</label>
				  	</div>
				  	<div class="input-field col s12">
				  		<label id="texto">Descripción:</label> </br></br>
				  		<textarea class="materialize-textarea" name="descripcion" required></textarea>
				  	</div>
				  	<div class="input-field col s6">
				  		<select name="problema">
				  			<option value="" disabled selected>Seleccionar...</option>
							<option value="1">1. Vehícular</option>
							<option value="2">2. Infraestructura</option>
							<option value="3">3. Áreas verdes</option>
							<option value="4">4. Mantenimiento</option>
						</select>
						<label id="texto">Tipo de Problema:</label>
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
					    <label id="texto">Departamento destino:</label>
					</div>
			 		<div class="col s12">
			 			<div class="file-field input-field">
							<div id="boton4" class="btn waves-effect waves-light btn-large">
							    <span>Imagen</span>
							        <input type="file" name="imagen">
							</div>
							<div class="file-path-wrapper">
							    <input class="file-path validate" type="text">
							</div>
						</div>
			 		</div>
				  	<div class="col s12">
					    <div id="section" class="col s6">
						  	<a href="/empleado/indexEmpleado" id="boton2" class="waves-effect waves-light btn-large">
						  		<b>Cancelar  </b><i class="fa fa-ban"></i>
						  	</a>
					    </div>
					    <div id="section" class="col s6">
					    	<button  type="submit" id="boton2" class="btn waves-effect waves-light" >
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