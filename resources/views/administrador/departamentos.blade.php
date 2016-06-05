@extends('templates.administrador')

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
				<div class="col s6" align=right>
					<h6 id="titulos1">ADMINISTRACIÓN DE</h6>
					<h4 id="titulos">
						DEPARTAMENTOS
					</h4>
				</div>
				<div class="col s6" align=right>
					<a href="/altadepartamentos" id="boton3" class="waves-effect waves-light btn-large">
						<i class="fa fa-plus" aria-hidden="true"></i>  AGREGAR
					</a>
				</div>
			</div>
			<img src="/imagenes/Sombra.png" class="responsive-img">
			<!--<div class="col s12" align=left style="margin-left: 14px">
				<label id="texto">Buscar por extensión: </label>
				<input id="buscador" type="text" class="validate">
				<label><a href="/departamentos" id="texto"><i class="fa fa-search"></i> Buscar</a></label>
			</div>-->
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<label style="font-size: 25px; color: #43a047;">
					<b>
						TOTAL DE DEPARTAMENTOS (@{{departamentos.length}})
					</b>
				</label>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th data-field="id">Clave</th>
			            	<th data-field="nombre">Nombre</th>
			            	<th data-field="extension">Extensión</th>
			            	<th data-field="eificio">Edificio</th>
			            	<th data-field="editar">Editar</th>
			            	<th data-field="eliminar">Eliminar</th>
			        	</tr>
			        </thead>
			        <tbody v-for="departamento in departamentos">
			        	<tr>
			        		<td>@{{ departamento.clave }}</td>
			        		<td>@{{ departamento.nombre }}</td>
			            	<td>@{{ departamento.extension }}</td>
			            	<td>@{{ departamento.edificio }}</td>
			            	<td>
			            		<center>
			            			<a href="/editarDepto/@{{departamento.clave}}">
			            				<i class="fa fa-pencil-square-o fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			            	<td>
			            		<center>
			            			<a href="/eliminarDepto/delete/@{{departamento.clave}}">
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
				departamentos: [],
			},
			// Metodos
			ready: function() {
				this.getDepartamentos();
			},
			methods:{
				getDepartamentos: function(){
					this.$http.get('/administrador/departamentos').then(function(response){
						this.$set('departamentos', response.data);
					});
				},
			}
		});
	</script>
@stop