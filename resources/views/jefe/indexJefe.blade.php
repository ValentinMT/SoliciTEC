@extends('templates.jefe')

@section('content')

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12">
				<a href="http://www.itcolima.edu.mx/">
					<img src="/imagenes/banner.png" alt="" class="responsive-img">
				</a>
			</div>
		</div>
	</center>
</section>

<section id="section" class="container">
	<center>
		<div class="row">
			<div class="col s12 l4">
				<a href="/jefe/solicitudes"><img id="section" src="/imagenes/solicitudes.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/jefe/solicitudes" id="boton" class="waves-effect waves-light btn-large">SOLICITUDES</a>
			</div>
			<div class="col s12 l4">
				<a href="/quejasJefe"><img id="section" src="/imagenes/quejas.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/quejasJefe" id="boton" class="waves-effect waves-light btn-large">QUEJAS</a>
			</div>
			<div class="col s12 l4">
				<a href="/jefe/empleados"><img id="section" src="/imagenes/empleados.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/jefe/empleados" id="boton" class="waves-effect waves-light btn-large">EMPLEADOS</a>
			</div>
		</div>
	</center>
</section>

@stop