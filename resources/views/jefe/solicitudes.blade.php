@extends('templates.jefe')

@section('content')

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/solicitudesver.jpg" alt="" class="responsive-img">
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
						SOLICITUDES
					</h4>
				</div>
				<div class="col s6" align=right>
					<a href="/altasolicitudes" id="boton3" class="waves-effect waves-light btn-large">
						<i class="fa fa-file-text"></i>  SOLICITAR</a>
				</div>
				<div class="col s12">
					<label>Urgencia | 1: <i>Baja</i> | 2: <i>Media</i> | 3: <i>Alta</i></label>
					<br>
					<label >Tipos de Problemas | 1: <i>Vehícular</i> | 2: <i>Infraestructura</i> | 3: <i>Áreas verdes</i> | 4: <i>Mantenimiento</i></label>
					<br><br>
				</div>
			</div>
			<img src="/imagenes/Sombra.png" class="responsive-img">
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<?php 
				$nombre = session()->get('jefe')->nombre;
			?>
			<div class="col s12">
				<hr>
				<div class="col s12">
					<div class="col s12">
						<label style="font-size: 20px; color: #43a047;">
							<b>
								SOLICITUDES RECIBIDAS (@{{solicitudes2.length}})
							</b>
						</label>
					</div>
				</div>
				<hr>

				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th>Folio Solicitud</th>
			            	<th>Fecha de Captura</th>
			            	<th>Tipo de Problema</th>
			            	<th>Urgencia</th>
			            	<th>Departamento Destino</th>
			            	<th>Folio Queja</th>
			            	<th>Descripción de Queja</th>
			            	<th>Generar PDF</th>
			        	</tr>
			        </thead>
			        <tbody v-for="solicitud2 in solicitudes2">
			        	<tr>
			        		<td>@{{ solicitud2.folio }}</td>
			        		<td>@{{ solicitud2.fechaCaptura }}</td>
			        		<td>@{{ solicitud2.problema }}</td>
			        		<td>@{{ solicitud2.urgencia }}</td>
			        		<td>@{{ solicitud2.nombre }}</td>
			        		<td>@{{ solicitud2.queja_folio }}</td>
			        		<td>@{{ solicitud2.descripcion }}</td>
			        		<td>
			            		<center>
			            			<a href="/genPDFRecibidas/@{{ solicitud2.folio }}" target="_blank">
			            				<i class="fa fa-file-pdf-o fa-2x" style="color: red; text" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        </tbody>
			    </table>
			</div>

			<div class="col s12">
				<hr>
				<div class="col s12">
					<div class="col s12">
						<label style="font-size: 20px; color: #43a047;">
							<b>
								SOLICITUDES REALIZADAS POR <font style="text-transform: uppercase;">{{$nombre}}</font> (@{{solicitudes.length}})
							</b>
						</label>
					</div>
				</div>
				<hr>

				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			            	<th>Folio Solicitud</th>
			            	<th>Fecha de Captura</th>
			            	<th>Tipo de Problema</th>
			            	<th>Urgencia</th>
			            	<th>Departamento Destino</th>
			            	<th>Folio Queja</th>
			            	<th>Descripción de Queja</th>
			            	<th>Generar PDF</th>
			            	<th>Eliminar</th>
			        	</tr>
			        </thead>
			        <tbody v-for="solicitud in solicitudes">
			        	<tr>
			        		<td>@{{ solicitud.folio }}</td>
			        		<td>@{{ solicitud.fechaCaptura }}</td>
			        		<td>@{{ solicitud.problema }}</td>
			        		<td>@{{ solicitud.urgencia }}</td>
			        		<td>@{{ solicitud.nombre }}</td>
			        		<td>@{{ solicitud.queja_folio }}</td>
			        		<td>@{{ solicitud.descripcion }}</td>
			        		<td>
			            		<center>
			            			<a href="/genPDFRealizadas/@{{ solicitud.folio }}" target="_blank">
			            				<i class="fa fa-file-pdf-o fa-2x" style="color: red; text" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        		<td>
			            		<center>
			            			<a href="/eliminarSolicitud/delete/@{{solicitud.folio}}">
			            				<i class="fa fa-trash fa-2x" style="color:#2e7d32;" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        </tbody>
			    </table>
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
			solicitudes: [],
			solicitudes2: [],
		},
		// Metodos
		ready: function() {
			this.getSolicitudes();
			this.getSolicitudes2();
		},
		methods:{
			getSolicitudes: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.solicitudes = response.data.solicitudes;
					//this.$set('solicitudes', response.data);
				});
			},
			getSolicitudes2: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.solicitudes2 = response.data.solicitudes2;
					//this.$set('solicitudes', response.data);
				});
			},
		},
	});
	</script>
@stop