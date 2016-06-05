@extends('templates.jefe')

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
				<div class="col s5" align=left>
					<!--<h6 id="titulos1">ADMINISTRACIÓN DE</h6>-->
					<h4 id="titulos">
						QUEJAS
					</h4>
				</div>
				<div class="col s7" align=right>
					<label class="left">Tipos de Problemas <br> 1: <i>Vehícular</i> | 2: <i>Infraestructura</i> | 3: <i>Áreas verdes</i> | 4: <i>Mantenimiento</i></label>
				</div>
			</div>
			<br><br><br>
			<img src="/imagenes/Sombra.png" class="responsive-img">
			<!--<div class="col s12" align=left style="margin-left: 14px">
				<label id="texto">Buscar por folio de queja: </label>
				<input id="buscador" type="text" class="validate">
				<label><a href="/quejas" id="texto"><i class="fa fa-search"></i> Buscar</a></label>
			</div>-->
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<!--<img src="/imagenes/Sombra2.png" class="responsive-img">-->
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<div class="col s6">
					<label style="font-size: 16px; color: #43a047;">
						<b>
							REALIZADAS POR EMPLEADOS DEL DEPARTAMENTO (@{{quejas2.length}})
						</b>
					</label>
					<ul class="collapsible" data-collapsible="accordion">
						<li v-for="queja2 in quejas2">
					      	<div class="collapsible-header active"><!--<i class="fa fa-language" aria-hidden="true"></i>-->
					      		<b>Queja #@{{ queja2.folio }} - Hecha Por: @{{ queja2.empleado_clave }} <i class="fa fa-arrow-down" aria-hidden="true"></i></b>
					      	</div>
					      	<div class="collapsible-body" align=justify style="padding: 20px;">
						      	<b>Fecha: </b>@{{ queja2.fechaHora }}
						      	<br>
						      	<b>Tipo de Problema: </b>@{{ queja2.problema }}
					        	<br><br>
						      	<a target="_black" href="@{{queja2.imagen}}"><img id="imagenQueja" src="@{{queja2.imagen}}" style="margin-left: 125px; border-radius: 20px;"></a>
					        	<br>
					        	<hr>
					        	<b>Descripción: </b>@{{ queja2.descripcion }}
					        	<hr>
					        	<br>
					        	<b>Dpto. Emisor: </b>@{{ queja2.empleado_departamento_clave }}
					        	<br>
					        	<b>Dpto. Receptor: </b>@{{ queja2.departamento_clave }}
					        	<br>
					      	</div>
					    </li>
					</ul>
				</div>
				<div class="col s6">
					<label style="font-size: 16px; color: #43a047;">
						<b>
							RECIBIDAS DE OTROS DEPARTAMENTOS (@{{quejas3.length}})
						</b>
					</label>
					<ul class="collapsible" data-collapsible="accordion">
						<li v-for="queja3 in quejas3">
					      	<div class="collapsible-header active"><!--<i class="fa fa-language" aria-hidden="true"></i>-->
					      		<b>Queja #@{{ queja3.folio }} - Hecha Por: @{{ queja3.empleado_clave }} <i class="fa fa-arrow-down" aria-hidden="true"></i></b>
					      	</div>
					      	<div class="collapsible-body" align=justify style="padding: 20px;">
						      	<b>Fecha: </b>@{{ queja3.fechaHora }}
						      	<br>
						      	<b>Tipo de Problema: </b>@{{ queja3.problema }}
					        	<br><br>
						      	<a target="_black" href="@{{queja3.imagen}}"><img id="imagenQueja" src="@{{queja3.imagen}}" style="margin-left: 125px; border-radius: 20px;"></a>
					        	<br>
					        	<hr>
					        	<b>Descripción: </b>@{{ queja3.descripcion }}
					        	<hr>
					        	<br>
					        	<b>Dpto. Emisor: </b>@{{ queja3.empleado_departamento_clave }}
					        	<br>
					        	<b>Dpto. Receptor: </b>@{{ queja3.departamento_clave }}
					        	<br>
					      	</div>
					    </li>
					</ul>
				</div>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<!--<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th data-field="fechaHora">Fecha | Hora</th>
			            	<th data-field="imagen">Imagen</th>
			            	<th data-field="descripcion">Descripción</th>
			            	<th data-field="empleado">Empleado</th>
			            	<th data-field="departamentoEnv">Dep. Emisor</th>
			            	<th data-field="departamentoRec">Dep. Receptor</th>
			            	<th data-field="problema">Problema</th>
			        	</tr>
			        </thead>

			        <tbody v-for="queja2 in quejas2">
			        	<tr>
			        		<td>@{{ queja2.fechaHora }}</td>
			        		<td><a target="_black" href="@{{queja2.imagen}}"><img id="imagenQueja" src="@{{queja2.imagen}}"></a></td>
			        		<td><p>@{{ queja2.descripcion }}</p></td>
			        		<td>@{{ queja2.empleado_clave }}</td>
			        		<td>@{{ queja2.empleado_departamento_clave }}</td>
			        		<td>@{{ queja2.departamento_clave }}</td>
			        		<td>@{{ queja2.problema }}</td>
			        	</tr>
			        </tbody>
			    </table>-->
			</div>
			<!--<div class="col s12">
				<br><br>
				<label style="font-size: 25px; color: #43a047;">
					<b>
						RECIBIDAS DE OTROS DEPARTAMENTOS (@{{quejas3.length}})
					</b>
				</label>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th data-field="fechaHora">Fecha | Hora</th>
			            	<th data-field="imagen">Imagen</th>
			            	<th data-field="descripcion">Descripción</th>
			            	<th data-field="empleado">Empleado</th>
			            	<th data-field="departamentoEnv">Dep. Emisor</th>
			            	<th data-field="departamentoRec">Dep. Receptor</th>
			            	<th data-field="problema">Problema</th>
			        	</tr>
			        </thead>

			        <tbody v-for="queja3 in quejas3">
			        	<tr>
			        		<td>@{{ queja3.fechaHora }}</td>
			        		<td><a target="_black" href="@{{queja3.imagen}}"><img id="imagenQueja" src="@{{queja3.imagen}}"></a></td>
			        		<td><p>@{{ queja3.descripcion }}</p></td>
			        		<td>@{{ queja3.empleado_clave }}</td>
			        		<td>@{{ queja3.empleado_departamento_clave }}</td>
			        		<td>@{{ queja3.departamento_clave }}</td>
			        		<td>@{{ queja3.problema }}</td>
			        	</tr>
			        </tbody>
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			</div>-->
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
			quejas2: [],
			quejas3: [],
		},
		// Metodos
		ready: function() {
			this.getQuejas2();
			this.getQuejas3();
		},
		methods:{
			getQuejas2: function(){
				this.$http.get('/jefe/quejas2').then(function(response){
					this.$set('quejas2', response.data);
				});
			},
			getQuejas3: function(){
				this.$http.get('/jefe/quejas3').then(function(response){
					this.$set('quejas3', response.data);
				});
			},
		}
	});
	</script>
@stop