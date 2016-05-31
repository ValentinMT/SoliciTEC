@extends('templates.administrador')

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
					<h6 id="titulos1">ADMINISTRACIÓN DE</h6>
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
				<label class="left">Tipo 1: <i>Administrador</i> | Tipo 2: <i>Jefe</i> | Tipo 3: <i>Empleado</i></label>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			        		<th data-field="clave">Clave</th>
			            	<th data-field="nombre">Nombre</th>
			            	<th data-field="tipo">Tipo</th>
			            	<th data-field="imss">IMSS</th>
			            	<th data-field="RFC">RFC</th>
			            	<th data-field="direccion">Dirección</th>
			            	<!--<th data-field="telefono">Teléfono</th>-->
			            	<th data-field="celular">Celular</th>
			            	<th data-field="email">E-mail</th>
			            	<!--<th data-field="fechaNacimiento">Fecha de nacimiento</th>-->
			            	<th data-field="departamento_clave">Departamento</th>
			            	<th data-field="editar">Editar</th>
			            	<th data-field="eliminar">Eliminar</th>
			        	</tr>
			        </thead>

			        <tbody v-for="empleado in empleados">
			        	<tr>
			        		<td>@{{ empleado.clave }}</td>
			        		<td>@{{ empleado.NombreE }}</td>
			        		<td>@{{ empleado.tipo }}</td>
			            	<td>@{{ empleado.imss }}</td>
			            	<td>@{{ empleado.RFC }}</td>
			            	<td>@{{ empleado.direccion }}</td>
			            	<!--<td>@{{ empleado.telefono }}</td>-->
			            	<td>@{{ empleado.celular }}</td>
			            	<td>@{{ empleado.email }}</td>
			            	<!--<td>@{{ empleado.fechaNacimiento }}</td>-->
			            	<td>@{{ empleado.NombreD }}</td>
			            	<td>
			            		<center>
			            			<a href="/editarEmp/@{{empleado.clave}}">
			            				<i class="fa fa-pencil-square-o fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			            	<td>
			            		<center>
			            			<a href="/eliminarEmp/delete/@{{empleado.clave}}">
			            				<i class="fa fa-trash fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        </tbody>
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			</div>
		</div>
	</center>
</section>

@stop

@section('scripts')
	<script>
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
	new Vue({
		//Atributos.
		el: 'body', //Ambiente de trabajo de Vue.
		data: {
			empleados: [],
		},
		// Metodos
		ready: function() {
			this.getEmpleados();
		},
		methods:{
			getEmpleados: function(){
				this.$http.get('/administrador/empleados').then(function(response){
					this.$set('empleados', response.data);
				});
			},
		}
	});
	</script>
@stop