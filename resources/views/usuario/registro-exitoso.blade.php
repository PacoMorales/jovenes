@extends('main')

@section('title','Registro exitoso!')

@section('header')
@endsection

@section('content')
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL  |  FUERZA JOVEN	|	TÉRMINOS DE USO' }}</div>
						<div class="card-body">
							<form method="POST" action="" aria-label="{{ __('Register') }}">
	                        @csrf
								<div class="form-group row mb-0">
									<div class="col-md-9 offset-md-2">
										<p>INSTRUCCIONES: Para que la solicitud sea tomada en cuenta, por favor, llenar de manera correcta TODOS los apartados (A y B).</p>
										<p>Al final de cada apartado deberá dar clic en el boton "Continuar" para que los datos sean registrados por el sistema.</p>
										<p>Por seguridad, una vez que termine de capturar su solicitud deberá CERRAR el navegador de Internet. Para que NO sea utilizado su USUARIO y CONTRASEÑA por otra persona.</p>
									</div>
									<div class="col-md-6 offset-md-5">
										<a href="{{ route('info-personal.show', $user->FOLIO) }}" class="btn btn-success">Aceptar...</a>
									</div>

									<div class="col-md-11 offset-md-1">
										<br><p>NOTA: Los datos han sido enviados a la cuenta de correo electrónico registrada por el usuario. En caso de no visualizarlo en la Bandeja de Entrada en 10 minutos, revisar la bandeja No Deseados.</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection