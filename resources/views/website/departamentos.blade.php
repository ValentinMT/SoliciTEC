@extends('templates.website')

@section('content')

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/departamentos-banner.jpg" alt="" class="responsive-img">
			</div>
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<div class="col s6" align=left>
					<h4 id="titulos">
						DEPARTAMENTOS
					</h4>
				</div>
				<div class="col s6" align=right>
					<a href="/altadepartamentos" id="boton3" class="waves-effect waves-light btn-large">
						<i class="fa fa-user-plus"></i>  AGREGAR</a>
				</div>
			</div>
			<img src="/imagenes/Sombra.png" class="responsive-img">
			<div class="col s12" align=left style="margin-left: 14px">
				<label id="texto">Buscar por extensión: </label>
				<input id="buscador" type="text" class="validate">
				<label><a href="/departamentos" id="texto"><i class="fa fa-search"></i> Buscar</a></label>
			</div>
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th data-field="id">Clave</th>
			            	<th data-field="nombre">Nombre (s)</th>
			            	<th data-field="extension">Extesión</th>
			            	<th data-field="eificio">Edificio</th>
			        	</tr>
			        </thead>

			        <tbody>
			        	<tr>
			        		<td>1</td>
			        		<td>Sistemas</td>
			            	<td>345</td>
			            	<td>A</td>
			        	</tr>
			        	<tr>
			        		<td>2</td>
			        		<td>Administración</td>
			            	<td>445</td>
			            	<td>B</td>
			        	</tr>
			        	<tr>
			        		<td>3</td>
			        		<td>Contabilidad</td>
			            	<td>365</td>
			            	<td>C</td>
			        	</tr>
			        	<tr>
			        		<td>4</td>
			        		<td>Industrial</td>
			            	<td>333</td>
			            	<td>D</td>
			        	</tr>
			        </tbody>
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			</div>
		</div>
	</center>
</section>

@stop