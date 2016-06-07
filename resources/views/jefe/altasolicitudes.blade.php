@extends('templates.jefe')

@section('content')

<?php
	$hoy =  date("Y/m/d");
?>

<div class="container">
	<center>
		<div class="row">
			<div class="col s12">
			 	<div class="col s7">
					</br>
					<form action="/registrar" method="POST" id="regsolicitud"  class="responsive-form">
						{{csrf_field()}}
						<div class="col s12">
							<img src="/imagenes/solicitud.png" class="responsive-img">
						</div>
						<div class="col s12">
							<label style="font-size: 25px; color: #43a047;"><b>REALIZAR SOLICITUD</b></label>
						</div>
						<img src="/imagenes/Sombra.png" class="responsive-img">
					  	
					  	<div class="input-field col s6">
							<input type="text"  name="fechaCaptura"  readonly="readonly" value="{{$hoy}}">
							<label id="texto"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha: </label>
					  	</div>
					  	<div class="input-field col s6">
							<select name="urgencia">
								<option value="" disabled selected>Seleccionar...</option>
								<option value="1"> 1. Baja  </option>
								<option value="2"> 2. Media </option>
								<option value="3"> 3. Alta  </option>
							</select>
							<label id="texto"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Urgencia: </label> 
					  	</div>
					  	<div class="input-field col s12">
					  		<?php 
					  			$nombre = session()->get('jefe')->nombre;
					  			$clave = session()->get('jefe')->clave;
					  		?>
					  		<input type="hidden" name="claveEmp" value="{{$clave}}">
							<input type="text" name="nombre" value="{{$nombre}}" readonly="readonly" >
							<label id="texto"><i class="fa fa-user" aria-hidden="true"></i> Nombre del empleado:</label>
					  	</div>
					  	<div class="input-field col s12">
					  		<select name="problema">
					  			<option value="" disabled selected>Seleccionar...</option>

								<option value="1"> 1. Vehícular  </option>
								<option value="2"> 2. Infraestructura </option>
								<option value="3"> 3. Áreas verdes </option>
								<option value="4"> 4. Mantenimiento </option>
							</select>
							<label id="texto"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Problema: </label>
					  	</div>
					  	<div class="input-field col s12">
					  	<?php $depto = App\InsertarDepModel::all(); ?>
						    <select name="dptoDestino">
						    	<option value="" disabled selected>Seleccionar...</option>
						    	@foreach($depto as $departamento)
							    <option value="{{ $departamento->clave }}">{{ $departamento->clave }} - {{ $departamento->nombre }}</option>
							    @endforeach
						    </select>
						    <!--<input type="text" class="validate" name="departamento_clave"required>-->
						    <label id="texto"><i class="fa fa-suitcase"></i>  Departamento Destino: </label>
					  	</div>
					  	<div class="col s12">
					  		<input type="hidden" name="folio_quejas" value="@{{folio_quejas}}">

						    <div id="section" class="col s6">
							  	<a href="/jefe/solicitudes" id="boton2" class="waves-effect waves-light btn-large">
							  		<b>Cancelar  </b><i class="fa fa-ban"></i>
							  	</a>
						    </div>
						    <div id="section" class="col s6">
						    	<button  id="boton2" target="_blank" class="btn waves-effect waves-light" type="submit" name="action">
							    	<b>Guardar  </b><i class="fa fa-floppy-o"></i>
							  	</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col s5 Colsp">
					<ul class="collapsible ulquejas" data-collapsible="accordion" class="responsive-form">
					   	<h5 style="font-size: 20px; color: #43a047;"> 
					   		<b>QUEJAS EXISTENTES </b>
					   	</h5>
						<img src="/imagenes/Sombra.png" class="responsive-img">

					    <li>
					       	<div class="collapsible-header">
						      	<b class="left"> <i class="fa fa-car" aria-hidden="true" style="color: red;"></i> 1. Problemas Vehículares</b>
						    </div>
						   	<div class="collapsible-body">
						   		<br><br>
						      	<p class="itemsQuejas" v-for="queja in quejas">
	 			      				<input class="with-gap" type="checkbox" id="test1@{{$index}}"  v-on:click="quejasfolio(queja.folio, $index)" name="queja_folio" />
	 					      		<label for="test1@{{$index}}">@{{queja.descripcion}}</label>
	 						 	</p>
	 						</div>
					    </li>
					    <li>
					      	<div class="collapsible-header">
					      		<b class="left"><i class="fa fa-building" aria-hidden="true" style="color: grey;"></i> 2. Problemas de Infraestructura </b>
					      	</div>
					      	<div class="collapsible-body">
					      		<br><br>
					      		<p class="itemsQuejas" v-for="queja1 in quejas1">
 			      					<input class="with-gap" type="checkbox" id="test2@{{$index}}"  v-on:click="quejasfolio2(queja1.folio, $index)" name="queja_folio" />
 					      			<label for="test2@{{$index}}">@{{queja1.descripcion}}</label>
 						 		</p>
					      	</div>
					    </li>
					    <li>
					      	<div class="collapsible-header">
					      		<b class="left"> <i class="fa fa-pagelines" aria-hidden="true" style="color: green;"></i> 3. Problemas de Áreas Verdes </b>
					      	</div>
					      	<div class="collapsible-body">
					      		<br><br>
					      		<p class="itemsQuejas" v-for="queja2 in quejas2">
 			      					<input class="with-gap" type="checkbox" id="test3@{{$index}}"  v-on:click="quejasfolio3(queja2.folio, $index)" name="queja_folio" />
 					      			<label for="test3@{{$index}}">@{{queja2.descripcion}}</label>
 						 		</p>
					      	</div>
					    </li>
					    <li>
					      	<div class="collapsible-header">
					      		<b class="left"> <i class="fa fa-wrench" aria-hidden="true" style="color: orange;"></i>4. Problemas de Mantenimiento </b>
					     	</div>
					      	<div class="collapsible-body">
					      		<br><br>
					      		<p class="itemsQuejas" v-for="queja3 in quejas3">
 			      					<input class="with-gap" type="checkbox" id="test4@{{$index}}"   v-on:click="quejasfolio4(queja3.folio, $index)" name="queja_folio" />
 					      			<label for="test4@{{$index}}">@{{queja3.descripcion}}</label>
 						 		</p>
					      	</div>
					    </li>
					</ul>
				</div>
			</div>
		</div>
	</center>
</div>


<!--<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<div class="col s6">
					<label style="font-size: 16px; color: #43a047;">
						<b>
							SOLICITUDES REALIZADAS (@{{liSolicitudes.length}})
						</b>
					</label>
					<ul class="collapsible" data-collapsible="accordion">
						<li v-for="solicitud in liSolicitudes">
					      	<div class="collapsible-header active">
					      		<b>Solicitud #@{{ solicitud.folio }} - Hecha Por: {{$nombre}} <i class="fa fa-arrow-down" aria-hidden="true"></i></b>
					      	</div>
					      	<div class="collapsible-body" align=justify style="padding: 20px;">
						      	<b>Fecha Captura: </b>@{{ solicitud.fechaCaptura }}
					        	<br>
					        	<b>Urgencia: </b>@{{ solicitud.urgencia }}
					        	<br>
					        	<b>Dpto. Destino: </b>@{{ solicitud.dptoDestino }}
					        	<br>
					        	<b>Folio Queja: </b>@{{ solicitud.folioQueja }}
					      	</div>
					    </li>
					</ul>
				</div>
			</div>
		</div>
	</center>
</section>-->

@stop

@section('scripts')
	<script>
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
	new Vue({
		//Atributos.
		el: 'body', //Ambiente de trabajo de Vue.
		data: {
			quejas: [],
			quejas1: [],
			quejas2: [],
			quejas3: [],
			folio_quejas: [],
		},
		// Metodos
		ready: function() {
			this.getquejasVehiculares();
			this.getquejas1();
			this.getquejas2();
			this.getquejas3();
		},
		methods:{
			getquejasVehiculares: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.quejas = response.data.quejaVehiculares;
				});
			},
			getquejas1: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.quejas1 = response.data.quejas1;
				});
			},
			getquejas2: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.quejas2 = response.data.quejas2;
				});
			},
			getquejas3: function(){
				this.$http.get('/Solicitud-jefe').then(function(response){
					this.quejas3 = response.data.quejas3;
				});
			},
			quejasfolio: function(quejass, i){
 			var queja_checked=document.getElementById("test1"+ i).checked;

	 			if(queja_checked){
	 				this.folio_quejas.push(quejass);
	 			}
	 			else {
	 				this.folio_quejas.$remove(quejass);
	 			}
 		   	},
 		   	quejasfolio2: function(quejass, i){
 			var queja1_checked=document.getElementById("test2"+ i).checked;

	 			if(queja1_checked){
	 				this.folio_quejas.push(quejass);
	 			}
	 			else {
	 				this.folio_quejas.$remove(quejass);
	 			}
 		   	},
 		   	quejasfolio3: function(quejass, i){
 			var queja2_checked=document.getElementById("test3"+ i).checked;

	 			if(queja2_checked){
	 				this.folio_quejas.push(quejass);
	 			}
	 			else {
	 				this.folio_quejas.$remove(quejass);
	 			}
 		   	},
 		   	quejasfolio4: function(quejass, i){
 			var queja3_checked=document.getElementById("test4"+ i).checked;

	 			if(queja3_checked){
	 				this.folio_quejas.push(quejass);
	 			}
	 			else {
	 				this.folio_quejas.$remove(quejass);
	 			}
 		   	},
		},
	});
	</script>
@stop

