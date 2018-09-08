@extends('main')

@section('title','Preguntas Frecuentes...')

@section('header')
@endsection

@section('content')
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header justify-content-center text-md-center" style="color:green;"><i class="fa fa-child"></i> {{ '¡Buen trabajo!'}} <i class="fa fa-child"></i><div style="color:green;">{{' Haz completado tu registro al programa Tarjeta de Descuento Fuerza Joven!' }}</div></div>
						<div class="card-body">
	                        @csrf
							<div class="form-group row mb-0">
								<div class="col-md-9 offset-md-2" style="color: orange;">
									<h3>PREGUNTAS FRECUENTES...</h3>
								</div>
								<div class="col-md-9 offset-md-2">
									<p style="color:green;">¿Cuáles son las tiendas donde participa la tarjeta?</p>
									<p style="color:blue;">Te invitamos a visitar nuestra <a href="btn btn-link" onclick="window.open('http://imej.edomex.gob.mx/tarjeta')">página oficial</a>, ahí encontrarás un listado de las tiendas donde puedes utilizar tu tarjeta.</p>
								</div>
								<br>
								<div class="col-md-9 offset-md-2 text-md-center" style="color: red;">
									<h4>¿Quieres participar en el programa social Jóvenes en Movimiento?</h4>
								</div>
								<div class="col-md-6 offset-md-5">
									<a href="{{ route('beneficiario.login') }}" class="btn btn-success">¡Registrarte aquí! <i class="fa fa-check"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection