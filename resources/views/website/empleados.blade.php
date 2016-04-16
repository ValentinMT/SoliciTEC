@extends('templates.website')

@section('content')

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/empleados-banner.jpg" alt="" class="responsive-img">
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
						EMPLEADOS
					</h4>
				</div>
				<div class="col s6" align=right>
					<a href="/altaempleados" id="boton3" class="waves-effect waves-light btn-large">
						<i class="fa fa-user-plus"></i>  AGREGAR</a>
				</div>
			</div>
			<img src="/imagenes/Sombra.png" class="responsive-img">
			<div class="col s12" align=left style="margin-left: 14px">
				<label id="texto">Buscar por clave de empleado: </label>
				<input id="buscador" type="text" class="validate">
				<label><a href="/empleados" id="texto"><i class="fa fa-search"></i> Buscar</a></label>
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
			            	<th data-field="imss">IMSS</th>
			            	<th data-field="RFC">RFC</th>
			            	<th data-field="direccion">Dirección</th>
			            	<th data-field="telefono">Teléfono</th>
			            	<th data-field="celular">Celular</th>
			            	<th data-field="email">E-mail</th>
			            	<th data-field="fechaNacimiento">Fecha de nacimiento</th>
			            	<th data-field="departamento_clave">Departamento</th>
			        	</tr>
			        </thead>

			        <tbody>
			        	<tr>
			        		<td>1</td>
			        		<td>José Valentín</td>
			            	<td>12345678</td>
			            	<td>MATV930916</td>
			            	<td>Pipila #106 Comala</td>
			            	<td>3155606</td>
			            	<td>3121429626</td>
			            	<td>12460316@itcolima.edu.mx</td>
			            	<td>16-09-1993</td>
			            	<td>Sistemas</td>
			        	</tr>
			        	<tr>
			        		<td>2</td>
			        		<td>Jesica Judith</td>
			            	<td>23456781</td>
			            	<td>JJCA940921</td>
			            	<td>Av. Tecnológico #11</td>
			            	<td>3152206</td>
			            	<td>3121142567</td>
			            	<td>12460234@itcolima.edu.mx</td>
			            	<td>21-08-1992</td>
			            	<td>Sistemas</td>
			        	</tr>
			        	<tr>
			        		<td>3</td>
			        		<td>José Antonio</td>
			            	<td>34567812</td>
			            	<td>JAGO910916</td>
			            	<td>Hidalgo #32 Comala</td>
			            	<td>3155634</td>
			            	<td>3121424578</td>
			            	<td>12460450@itcolima.edu.mx</td>
			            	<td>11-04-1991</td>
			            	<td>Sistemas</td>
			        	</tr>
			        </tbody>
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			</div>
		</div>
	</center>
</section>

@stop