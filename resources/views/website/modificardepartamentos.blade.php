@extends('templates.website')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="altadepartamento" action="/actualizarDepto/update/{{$departamentos->clave}}" method="POST" class="responsive-form">
					{{csrf_field()}}
					<div class="col s12">
						<img src="/imagenes/dep.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>EDITA DEPARTAMENTO</b></label>
					</div>
					<img src="/imagenes/Sombra3.png" class="responsive-img">
					<div class="input-field col s12">
						<input type="text" class="validate" name="nombre" required value="{{$departamentos->nombre}}">
						<label id="texto"><i class="fa fa-user"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="extension" value="{{$departamentos->extension}}">
						<label id="texto"><i class="fa fa-phone"></i>  Extensión: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="edificio" required value="{{$departamentos->edificio}}">
						<label id="texto"><i class="fa fa-building-o"></i>  Edificio: </label>
				  	</div>
				  	<div class="col s12">
					    <div id="section" class="col s6">
						  	<a href="/departamentos" id="boton2" class="waves-effect waves-light btn-large">
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