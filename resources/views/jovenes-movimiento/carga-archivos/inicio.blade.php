@extends('main')

@section('title','Carga tus Archivos')

@section('tags')
						<div class="row justify-content-end">
							<div class="mol-md-8">
								<div class="card">
									<div class="card-folio justify-content-center"><i class="fa fa-user"></i> {{'LOG: '}}{!! $usuario->login !!}</div>
								</div>
							</div>
						</div>
@endsection

@section('content')
	{!! Form::open(['route' => 'beneficiario.archivoCaptura', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header justify-content-center" style="color: purple;">{{ '  PROGRAMA SOCIAL |  ' }}{!! $programa->programa !!} <i class="fa fa-user"></i></div>
						<div class="card-body">
						<div class="form-group row mb-0">
							<img src="{{asset('images/IMEJ-Ok.png')}}" width="1000" height="175">
						</div>
<!--# COMPROBAR INFORMACION ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center" style="color:green;">{{ 'COMPROBAR INFORMACIÓN DEL REGISTRO' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right" style="color:green;">
									{!! Form::label('FOLIO','Folio asignado por sistema') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<p><input type="text" name="FOLIO" value="{{$usuario->folio}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right" style="color:green;">
									{!! Form::label('CORREO','Correo electrónico (e-mail)') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<p><input type="text" name="LOGIN" value="{{$usuario->login}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>
<!--# CARGAR ARCHIVOS ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center" style="color:green;">{{ 'CARGA TUS ARCHIVOS EN FORMATO PDF' }} <div class="text-md-center" style="color:red;">{{ 'RECUERDA QUE EL TAMAÑO MÁXIMO ES DE 200 KB POR DOCUMENTO' }}</div></div>
									</div>
								</div>
							</div>
							<br>
							@if(count($errors) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('INE','* IFE O INE: ') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<input type="file" name="INE" id='fileinput' accept="application/pdf" onchange="ValidateSize(this)">
								</div>
							</div>
							<br>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('COMP_ESTUDIOS','* COMPROBANTE DE ESTUDIOS: ') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<input type="file" name="COMP_ESTUDIOS" accept="application/pdf" onchange="ValidateSize(this)">
								</div>
							</div>
							<br>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Continuar!',['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	<script type='text/javascript'>
		function ValidateSize(file) {
			if(!file){
        		swal({
  					title: "Error!",
  					text: "No haz seleccionado un archivo!",
  					icon: "error",
				});
    		}
	        var FileSize = file.files[0].size / 1024 / 1024; // in MB
	        //alert(file.files[0].size);
	        //alert(FileSize);
	        if (FileSize > 0.20000000) {
	            swal({
  					title: "Tamaño excedido!",
  					text: "El tamaño de tu documento excede los 200KB!",
  					icon: "error",
				});
	            $(file).val(''); //for clearing with Jquery
	        } else {
	        	swal({
  					title: "Buen trabajo!",
  					text: "El tamaño de tu documento es adecuado!",
  					icon: "success",
				});
	        }
	    }
</script>
	{!! Form::close() !!}
@endsection

@section('scripts')
	<script src="/js/apartado-a/id-geo.js"></script>
@endsection