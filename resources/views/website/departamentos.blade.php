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
			            	<th data-field="editar">Editar</th>
			            	<th data-field="eliminar">Eliminar</th>
			        	</tr>
			        </thead>
			        <tbody>
			        	@foreach($departamentos as $departamentos)
			        	<tr>
			        		<td>{{ $departamentos->clave }}</td>
			        		<td>{{ $departamentos->nombre }}</td>
			            	<td>{{ $departamentos->extension }}</td>
			            	<td>{{ $departamentos->edificio }}</td>
			            	<td>
			            		<center>
			            			<a href="/editarDepto/{{$departamentos->clave}}">
			            				<i class="fa fa-pencil-square-o fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			            	<td>
			            		<center>
			            			<a href="/eliminarDepto/delete/{{$departamentos->clave}}">
			            				<i class="fa fa-trash fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        	@endforeach
			        </tbody>
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			</div>
		</div>
	</center>
</section>

@stop