@extends('templates.administrador')

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
				<div class="col s12" align=left>
					<h6 id="titulos1">ADMINISTRACIÓN DE</h6>
					<h4 id="titulos">
						SOLICITUDES
					</h4>
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
			<div class="col s12">
				<?php
					$contador=\DB::table('solicitudes')->count();
				?>
				<label style="font-size: 25px; color: #43a047;">
					<b>
						TOTAL DE SOLICITUDES ({{$contador}})
					</b>
				</label>
				<img src="/imagenes/Sombra2.png" class="responsive-img">
				<table class="highlight centered responsive-table">
			        <thead>
			        	<tr>
			        		<th>#</th>
			        		<th>Folio Solicitud</th>
			        		<th>Nombre Solicitante</th>
			            	<th>Fecha de Captura</th>
			            	<th>Tipo de Problema</th>
			            	<th>Urgencia</th>
			            	<th>Departamento Destino</th>
			            	<th>Folio Queja</th>
			            	<th>Descripción de Queja</th>
			            	<th>Generar PDF</th>
			        	</tr>
			        </thead>
			        <?php
						$contador = 1;
					?>
			        @foreach($solicitudes as $solicitud)
			        <tbody> <!--v-for="queja in quejas">-->
			        	<tr>
			        		<td>{{ $contador++ }}</td>
			        		<td>{{ $solicitud->folio }}</td>
			        		<td>{{ $solicitud->nombreEmp }}</td>
			        		<td>{{ $solicitud->fechaCaptura }}</td>
			        		<td>{{ $solicitud->problema }}</td>
			        		<td>{{ $solicitud->urgencia }}</td>
			        		<td>{{ $solicitud->nombreDpto }}</td>
			        		<td>{{ $solicitud->queja_folio }}</td>
			        		<td>{{ $solicitud->descripcion }}</td>
			        		<td>
			            		<center>
			            			<a href="/genPDF/{{$solicitud->folio}}" target="_blank">
			            				<i class="fa fa-file-pdf-o fa-2x" style="color: red; text" aria-hidden="true"></i>
			            			</a>
			            		</center>
			            	</td>
			        	</tr>
			        </tbody>
			        @endforeach
			    </table>
			    <img src="/imagenes/Sombra2.png" class="responsive-img">
			    <center>
					{!! $solicitudes->render() !!}
				</center>
			</div>
		</div>
	</center>
</section>

@stop