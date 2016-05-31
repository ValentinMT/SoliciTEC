@extends('templates.administrador')

@section('content')

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/quejas-banner.jpg" alt="" class="responsive-img">
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
						QUEJAS
					</h4>
				</div>
			</div>
			<img src="/imagenes/Sombra.png" class="responsive-img">
			<div class="col s12" align=left style="margin-left: 14px">
				<label id="texto">Buscar por folio de queja: </label>
				<input id="buscador" type="text" class="validate">
				<label><a href="/quejas" id="texto"><i class="fa fa-search"></i> Buscar</a></label>
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
			        		<th data-field="folio">Folio</th>
			            	<th data-field="fechaHora">Fecha | Hora</th>
			            	<th data-field="imagen">Imagen</th>
			            	<th data-field="descripcion">Descripción</th>
			            	<th data-field="empleado">Empleado</th>
			            	<th data-field="departamentoEnv">Dep. Emisor</th>
			            	<th data-field="departamentoRec">Dep. Receptor</th>
			            	<th data-field="eliminar">Eliminar</th>
			        	</tr>
			        </thead>

			        <tbody v-for="queja in quejas">
			        	<tr>
			        		<td>@{{ queja.folio }}</td>
			        		<td>@{{ queja.fechaHora }}</td>
			        		<td>@{{ queja.imagen }}</td>
			        		<td>@{{ queja.descripcion }}</td>
			        		<td>@{{ queja.empleado_clave }}</td>
			        		<td>@{{ queja.empleado_departamento_clave }}</td>
			        		<td>@{{ queja.departamento_clave }}</td>
			        		<td>
			            		<center>
			            			<a href="/eliminarQueja/delete/@{{queja.folio}}">
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
			quejas: [],
		},
		// Metodos
		ready: function() {
			this.getQuejas();
		},
		methods:{
			getQuejas: function(){
				this.$http.get('/administrador/quejas').then(function(response){
					this.$set('quejas', response.data);
				});
			},
		}
	});
	</script>
@stop