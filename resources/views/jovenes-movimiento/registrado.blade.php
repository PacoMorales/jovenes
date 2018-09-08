@extends('mainjm')

@section('title','Registrado!')

@section('header')
@endsection

@section('content')
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL  |  JÓVENES EN MOVIMIENTO 	|	TÉRMINOS DE USO' }}</div>
						<div class="card-body">
	                        @csrf
								<div class="form-group row mb-0 text-md-center">
									<div class="col-md-9 offset-md-2">
										<p>¡Bien!</p>
										<p>Tus información ha sido registrada.</p>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection