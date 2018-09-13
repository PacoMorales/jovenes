@extends('mainjm')

@section('title','Registrado!')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header justify-content-center text-md-center" style="color:green;"><i class="fa fa-child"></i> {{ '¡Buen trabajo!'}} <i class="fa fa-child"></i><div style="color:green;">{{' Haz completado tu registro al Programa Social Jóvenes en Movimiento!' }}</div></div>
						<div class="card-body">
						<div class="form-group row mb-0">
							<img src="{{asset('images/IMEJ-Ok.png')}}" width="750" height="150">
						</div>
	                        @csrf
								<div class="form-group row mb-0 text-md-center">
									<div class="col-md-8 offset-md-2">
										<p>¡Bien!</p>
										<p>{{$usuario->nombres}} tu información ha sido registrada.</p>
										<p>Tu folio es: imej-{{ $usuario->folio }}.</p>

										<p>Guarda esta pantalla por medio de una captura, ya que será tu comprobante de alta.</p>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection