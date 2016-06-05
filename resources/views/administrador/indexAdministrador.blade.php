@extends('templates.administrador')

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
	<div class="row">
		<div class="col s12 l3">
			<center>
				<a href="/solicitudes"><img id="section" src="/imagenes/solicitudes.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/solicitudes" id="boton" class="waves-effect waves-light btn-large">SOLICITUDES</a>
			</center>
		</div>
		<div class="col s12 l3">
			<center>
				<a href="/quejas"><img id="section" src="/imagenes/quejas.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/quejas" id="boton" class="waves-effect waves-light btn-large">QUEJAS</a>
			</center>
		</div>
		<div class="col s12 l3">
			<center>
				<a href="/empleados"><img id="section" src="/imagenes/empleados.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/empleados" id="boton" class="waves-effect waves-light btn-large">EMPLEADOS</a>
			</center>
		</div>
		<div class="col s12 l3">
			<center>
				<a href="/departamentos"><img id="section" src="/imagenes/departamentos.jpg" alt="" class="circle responsive-img z-depth-2"></a>
				<a href="/departamentos" id="boton" class="waves-effect waves-light btn-large">DEPARTAMENTOS</a>
			</center>
		</div>
	</div>
</section>

@stop