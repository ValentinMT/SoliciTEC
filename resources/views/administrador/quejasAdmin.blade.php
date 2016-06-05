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
				<div class="col s5" align=left>
					<h6 id="titulos1">ADMINISTRACIÓN DE</h6>
					<h4 id="titulos">
						QUEJAS
					</h4>
				</div>
				<div class="col s7" align=right>
					<label class="left">Tipos de Problemas <br> 1: <i>Vehícular</i> | 2: <i>Infraestructura</i> | 3: <i>Áreas verdes</i> | 4: <i>Mantenimiento</i></label>
				</div>
			</div>
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
				<?php
					$contador=\DB::table('queja')->count();
				?>
				<label style="font-size: 25px; color: #43a047;">
					<b>
						TOTAL DE QUEJAS ({{$contador}})
					</b>
				</label>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			        		<th data-field="contador">#</th>
			            	<!--<th data-field="fechaHora">Fecha | Hora</th>-->
			            	<!--<th data-field="imagen">Imagen</th>-->
			            	<!--<th data-field="descripcion">Descripción</th>-->
			            	<th data-field="empleado">Hecha Por</th>
			            	<th data-field="departamentoEnv">Departamento Emisor</th>
			            	<th data-field="departamentoRec">Departamento Receptor</th>
			            	<th data-field="problema">Tipo de Problema</th>
			            	<th data-field="info">Información</th>
			            	<th data-field="eliminar">Eliminar</th>
			        	</tr>
			        </thead>
			        <?php
						$contador = 1;
					?>
			        @foreach($quejas as $queja)
			        <tbody> <!--v-for="queja in quejas">-->
			        	<tr>
			        		<td>{{ $contador++ }}</td>
			        		<!--<td>{{ $queja->fechaHora }}</td>-->
			        		<!--<td><a target="_black" href="{{$queja->imagen}}"><img id="imagenQueja" src="{{$queja->imagen}}"></a></td>-->
			        		<!--<td><p>{{ $queja->descripcion }}</p></td>-->
			        		<td>{{ $queja->empleado_clave }}</td>
			        		<td>{{ $queja->empleado_departamento_clave }}</td>
			        		<td>{{ $queja->departamento_clave }}</td>
			        		<td>{{ $queja->problema }}</td>
			        		<td><a href="#!" v-on:click="mostrar({{$queja->folio}})">Ver detalles</a></td>
			        		<td>
			            		<center>
			            			<a href="/eliminarQueja/delete/{{$queja->folio}}">
			            				<i class="fa fa-trash fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        </tbody>
			        @endforeach
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			    <center>
					{!! $quejas->render() !!} <!--coloca la numeracion-->
				</center>
			</div>
		</div>
	</center>
</section>

<div class="row">
	<div id="detalle" class="modal">
	    <div class="modal-content">
	      	<h4><b>Fecha: </b>@{{fechaHora}}</h4>
		    <p>
	      		<label>Tipos de Problemas <br> 1: <i>Vehícular</i> | 2: <i>Infraestructura</i> | 3: <i>Áreas verdes</i> | 4: <i>Mantenimiento</i></label>
	      		<hr>
	      		<b>Hecha Por: </b>@{{empleado_clave}}
	      		<br>
	      		<b>Tipo de Problema: </b>@{{problema}}
	      		<br>
	      		<a target="_black" href="@{{imagen}}"><img id="imagenQueja" src="@{{imagen}}" style="margin-left: 250px; border-radius: 20px;"></a>
	      		<br>
	      		<hr>
	      		<b>Descripción: </b>@{{descripcion}}
	      		<hr>
	      		<br>
	      		<b>Dpto. Emisor: </b>@{{empleado_departamento_clave}}
	      		<br>
	      		<b>Dpto. Receptor: </b>@{{departamento_clave}}
	      		<br>
	      		<hr>
		    </p>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
	    </div>
	</div>
</div>

@stop

@section('scripts')
	<script>
		new Vue({
			el: 'body',
			data: {
				fechaHora: "",
				imagen: "",
				descripcion: "",
				empleado_clave: "",
				empleado_departamento_clave: "",
				departamento_clave: "",
				problema: "",
			},

			methods: {
				mostrar: function(folio){
					this.$http.get('/detalle-queja', {folio}).then(function(response){
						//console.log(response.data)
						this.fechaHora = response.data.queja.fechaHora;
						this.imagen = response.data.queja.imagen;
						this.descripcion = response.data.queja.descripcion;
						this.empleado_clave = response.data.queja.empleado_clave;
						this.empleado_departamento_clave = response.data.queja.empleado_departamento_clave;
						this.departamento_clave = response.data.queja.departamento_clave;
						this.problema = response.data.queja.problema;
						$('#detalle').openModal();
					});
				}

			}
		})
	</script>
@stop

<!--@section('scripts')
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
@stop-->