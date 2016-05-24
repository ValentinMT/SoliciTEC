@extends('templates.administrador')

@section('content')

<div class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
				</br>
				<form id="altadepartamento" action="/insertarDepto" method="POST" class="responsive-form">
					{{csrf_field()}}
					<div class="col s12">
						<img src="/imagenes/dep.png" class="responsive-img">
					</div>
					<div class="col s12">
						<label style="font-size: 27px; color: #43a047;"><b>AGREGA DEPARTAMENTO</b></label>
					</div>
					<img src="/imagenes/Sombra3.png" class="responsive-img">
					<div class="input-field col s12">
						<input type="text" class="validate" name="nombre" required>
						<label id="texto"><i class="fa fa-home"></i>  Nombre: </label>
				  	</div>
				  	<div class="input-field col s6">
						<input type="text" class="validate" name="extension">
						<label id="texto"><i class="fa fa-phone"></i>  Extensión: </label>
				  	</div>
				  	<!--<div class="input-field col s6">
						<input type="text" class="validate" name="edificio" required>
						<label id="texto"><i class="fa fa-building-o"></i>  Edificio: </label>
				  	</div>-->
				  	<div class="input-field col s6">
					    <select>
					      <option value="" disabled selected>Seleccionar...</option>
					      <option value="A">Edificio A</option>
					      <option value="B">Edificio B</option>
					      <option value="C">Edificio C</option>
					      <option value="D">Edificio D</option>
					      <option value="E">Edificio E</option>
					      <option value="F">Edificio F</option>
					      <option value="G">Edificio G</option>
					      <option value="H">Edificio H</option>
					      <option value="I">Edificio I</option>
					      <option value="J">Edificio J</option>
					      <option value="K">Edificio K</option>
					      <option value="L">Edificio L</option>
					      <option value="M">Edificio M</option>
					      <option value="O">Edificio O</option>
					      <option value="P">Edificio P</option>
					      <option value="Q">Edificio Q</option>
					      <option value="R">Edificio R</option>
					      <option value="S">Edificio S</option>
					      <option value="T">Edificio T</option>
					      <option value="U">Edificio U</option>
					      <option value="V">Edificio V</option>
					      <option value="W">Edificio W</option>
					      <option value="X">Edificio X</option>
					      <option value="Y">Edificio Y</option>
					      <option value="Z">Edificio Z</option>
					    </select>
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

@section('scripts')
	<script src="/js/admin.js"></script>
@stop