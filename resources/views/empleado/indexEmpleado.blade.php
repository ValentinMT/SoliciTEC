@extends('templates.empleado')

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

<div id="section" class="container">
	<center>
		<div class="row">
		 	<div class="col s12">
		 		<a href="/empleados/quejas"><img id="section" src="/imagenes/quejas2.jpg" alt="" class="circle responsive-img z-depth-2"></a>
			</div>
			<div class="col s12">
				<a href="/empleados/quejas" id="boton" class="waves-effect waves-light btn-large">REALIZAR QUEJA</a>
			</div>
		</div>
	</center>
</div>

@stop