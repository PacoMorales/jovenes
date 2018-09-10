@extends('mainjm')

@section('title','Crea tu cuenta')

@section('header')
@endsection

@section('content')

	{!! Form::open(['route' => 'beneficiario.captura', 'method' => 'POST']) !!}
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
								<div class="col-md-12 col-form-label text-md-center">
									{!! Form::label('NOMBRE_COMPLETO','* Ingresa tu nombre completo') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-4 offset-md-0 text-md-center">
									{!! Form::text('APELLIDO_PATERNO',null,['class' => 'form-control','placeholder' => 'APELLIDO PATERNO' ,'required','minlength' => '4','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>
								<div class="col-md-4 offset-md-0 text-md-center">
									{!! Form::text('APELLIDO_MATERNO',null,['class' => 'form-control','placeholder' => 'APELLIDO MATERNO' ,'required','minlength' => '4','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>
								<div class="col-md-4 offset-md-0 text-md-center">
									{!! Form::text('NOMBRES',null,['class' => 'form-control','placeholder' => 'NOMBRES' ,'required','minlength' => '1','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>
							</div>
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
									{!! Form::label('PASSWORD','* Ingresa una contraseña') !!}
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
	{!! Form::close() !!}
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
	<script type="text/javascript">
		function soloLetras(e){
	       key = e.keyCode || e.which;
	       tecla = String.fromCharCode(key);
	       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	       especiales = "8-37-39-46";

	       tecla_especial = false
	       for(var i in especiales){
	            if(key == especiales[i]){
	                tecla_especial = true;
	                break;
	            }
	        }
	        if(letras.indexOf(tecla)==-1 && !tecla_especial){
	            return false;
	        }
	    }
	</script>
@endsection