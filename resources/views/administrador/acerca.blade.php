@extends('templates.administrador')

@section('content')

<div id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<div class="slider">
					<ul class="slides" class="cyan darken-3">
				    	<li>
				        	<img src="/imagenes/solicitud.jpg">
				        	<div class="caption">
				          		<h3>¡Bienvenido!</h3>
				          		<h5 class="light grey-text text-lighten-3">Solicitudes de mantenimiento</h5>
				        	</div>
				      	</li>
				      	<li>
				        	<img src="/imagenes/solicitud2.jpg">
				      	</li>
				    </ul>
				</div>
			</div>
		</div>
	</center>
</div>

<div id="section" class="container">
	<div class="row">
		<div class="col s12" align=justify>
			<h5 id="titulos2">HISTORIA</h5>
			<p id="parrafo">
				El Instituto Tecnológico de Colima (ITCOL) fue fundado el 6 de octubre de 1976 
				con tres carreras: Ingeniería Industrial en Planeación, Ingeniería Industrial 
				Eléctrica y la Licenciatura en Administración de Empresas Turísticas en Planeación 
				y Promoción, con una matrícula total de 62 alumnos y 14 trabajadores, entre directivos, 
				docentes y administrativos.
				<br>
				La creación de un Instituto Tecnológico en Colima, se debió principalmente al propósito 
				del gobierno federal de establecer una alternativa de formación profesional que impulsara 
				el desarrollo de la región en las áreas industrial y de servicios. Pero es importante asentar 
				que gracias al empuje de la juventud colimense ante la necesidad de continuar sus estudios 
				superiores, un grupo de estudiantes de la carrera de Ingeniería Eléctrica que asistía a la 
				vecina localidad de Ciudad Guzmán, Jalisco, visitaron al entonces Gobernador del Estado, 
				pidiéndole que apoyara con su gestión para que Colima tuviera su propio Instituto Tecnológico, 
				lo cual redundaría en beneficio del estado, el entorno regional y el país en general. 
			</p>

			<div class="col s6">
				<h5 id="titulos2">Misión</h5>
					<p id="parrafo">
						Formar seres humanos íntegros con saberes pertinentes y 
						competencias globales para la transformación armónica de la sociedad. 
					</p>
			</div>

			<div class="col s6">
				<h5 id="titulos2">Visión</h5>
					<p id="parrafo">
						Ser una institución educativa líder, con ambientes democráticos 
						a favor del desarrollo sostenible de la humanidad. 
					</p>
			</div>
		</div>
	</div>
</div>

@stop