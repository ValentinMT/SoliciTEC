@extends('templates.jefe')

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
			<p id="parrafo">
				Somos una librería independiente dedicada desde hace más de 5 años a ofrecer a todos una amplia selección de títulos.
				Somos una empresa local comprometida con el desarrollo de nuestra comunidad.
			</p>

			<div class="col s6">
				<h5 id="titulos2">Misión</h5>
					<p id="parrafo">
						Satisfacer las exigencias de nuestros clientes y la demanda del mercado en general
						ofreciendo un precio atractivo y la más alta calidad.
					</p>
			</div>

			<div class="col s6">
				<h5 id="titulos2">Visión</h5>
					<p id="parrafo">
						Ser una empresa activa comercialmente para así llegar a ser líder en venta de libros,
						tanto en México como en el extranjero.
					</p>
			</div>
		</div>
	</div>
</div>

@stop