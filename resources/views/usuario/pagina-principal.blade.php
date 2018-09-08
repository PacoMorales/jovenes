@extends('main')

@section('title','Principal')

@section('tags')
<div class="row justify-content-end">
	<div class="mol-md-8">
		<div class="card">
			<div class="card-folio justify-content-start"><i class="fa fa-address-card"></i> {!! $datos->nombres !!}</div>
		</div>
	</div>
	<div class="justify-content-end">
		<div class="mol-md-8">
			<div class="card">
				<div class="card-folio justify-content-center"><i class="fa fa-tag"></i> {{'FOLIO: '}}{!! $usuario->folio !!}</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
	
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL |  '}} {!!$programa->programa!!} {{'	|	INFORMACIÓN GENERAL 	|	PRINCIPAL' }} <i class="fa fa-home"></i> </div>
						<div class="card-body">
							<table class="table table-striped">
							  <thead>
							    <tr>
							      <th>Folio de Tarjeta</th>
							      <th>Correo Electrónico</th>
							      <th>Actualizar información (Apartado A - Apartado B)</th>
							      <!--<th>Formato</th>-->
							    </tr>
							  </thead>
							  <tbody>
								    <tr>
								      <th>{{ $usuario->folio }}</th> 
								      <th>{{ $usuario->login }}</th>
								      <td><a href="{{ route('info-personal.edit',$usuario->folio) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Datos Personales</a> <a href="{{ route('info-sociodemo.edit',$usuario->folio) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Datos Socioeconomicos</a></td>
							          <!--<td><a href="" class="btn btn-danger"><i class="fa fa-file"></i> PDF</a></td>-->
								    </tr>
							  </tbody>
							</table>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-2 offset-md-10">
								<a href="{{ route('usuario.edit',$usuario->folio) }}" class="btn btn-danger">Salir <i class="fa fa-window-close"></i></a>
							</div>
							<!--<div class="col-md-2 offset-md-6">
								<a href="{{ route('usuario.edit',$usuario->folio) }}" class="btn btn-primary"><i class="fa fa-address-card"></i> <i class="fa fa-pencil"></i> Crear otra cuenta</a>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	
@endsection