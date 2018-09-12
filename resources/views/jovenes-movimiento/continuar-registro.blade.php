@extends('mainjm')

@section('title','Continuar registro')

@section('header')
@endsection

@section('content')

	{!! Form::open(['route' => 'beneficiario.continuar', 'method' => 'POST']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-md-center" style="color:purple;">{{ '  PROGRAMA SOCIAL JÓVENES EN MOVIMIENTO' }}</div>
						<div class="card-body">
						<div class="form-group row mb-0">
							<img src="{{asset('images/IMEJ-Ok.png')}}" width="750" height="150">
						</div>
						<br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LOGIN','* Ingresa correo electrónico') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::email('LOGIN',null,['class' => 'form-control','placeholder' => 'CORREO ELECTRÓNICO' ,'required','minlength' => '6','maxlength' => '30']) !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PASSWORD','* Ingresa tu contraseña') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::password('PASSWORD',['class' => 'form-control','placeholder' => 'CONTRASEÑA','required','minlength' => '6','maxlength' => '30']) !!}
								</div>
							</div>
							@if(count($errors) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Crear cuenta!',['class' => 'btn btn-success']) !!}
								</div>
							</div>
							{!! Form::close() !!}
							<br>
                        	<div class="col-md-9 offset-md-2 text-md-center">
								<h5 style="color:green;">¿Quieres saber más sobre este Programa Social?</h5>
								<p>Te invitamos a visitar nuestra <a href="btn btn-link" onclick="window.open('http://imej.edomex.gob.mx/jovenes')">página oficial</a>, ahí encontrarás toda la información.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<div class="form-group row">
                            	<div class="col-md-12 offset-md-0 text-md-center">
                                	<div class="form-check">
                                    	<label class="form-check-label" style="color:gray;">
                                        	Consulta nuestras redes sociales
                                    	</label>
                                    	<div class="col-md-0 offset-md-0">
                                    		<button class="btn btn-info" onclick="window.open('https://twitter.com/imej_?lang=es');"><i class="fa fa-twitter"></i> @IMEJ_</button>
                                    		<button class="btn btn-primary" onclick="window.open('https://www.facebook.com/imej.edomex/');"><i class="fa fa-facebook"></i> imej.edomex</button>
                                    	</div>
                                	</div>
                            	</div>
                        	</div><br>
	<div class="text-md-center">
		<a class="btn btn-link"  onclick="window.open('http://imej.edomex.gob.mx/acerca-de/aviso-privacidad');"><i class="fa fa-info-circle"></i> Aviso de privacidad</a>
	</div>
@endsection