@extends('main')

@section('title','Administrador')

@section('tags')
    					<div class="row justify-content-end">
							<div class="mol-md-8">
								<div class="card">
									<div class="card-folio justify-content-center"><i class="fa fa-coffee"></i> {!! $adm->nombres !!}</div>
								</div>
							</div>

							

							<div class="justify-content-end">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-folio justify-content-center"><i class="fa fa-tag"></i> {{'FOLIO: '}}{!! $adm->folio !!}</div>
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
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL |  '}} {!!$programa->programa!!} {{'	|	MÓDULO ADMINISTRADOR' }} <i class="fa fa-coffee"></i></div>
						<div class="card-body">

						<div class="form-group row">

							<div class="col-md-4 offset-md-0">
                                <div class="form-check">
                                    <label class="form-check-label" for="Total"><i class="fa fa-address-card"></i>
                                        	Total de Tarjetas Registradas: {!! $cant_total !!}
                                    </label>                                    
                                </div>                            	
                            </div>
                        </div>
							<table class="table table-striped">
							  <thead>
							    <tr>
							      <th>FOLIO</th>
							      <th>CORREO ELECTRÓNICO</th>
							      <th>NOMBRE COMPLETO</th>
							      <th>ACCIONES</th>
							    </tr>
							  </thead>
							  <tbody>
							  		@if($usuario->folio != 0)
									    <tr>
									      <th>{{ $usuario->folio }}</th>
									      <th>{{ $usuario->usu }}</th>
									      <th>{{ $datos->nombre_completo }}</th>
									      <th><!--<a href="{{ route('info-personal.edit',$usuario->folio) }}" class="btn btn-info"><i class="fa fa-user"></i></a>
									      <a href="" class="btn btn-primary"><i class="fa fa-globe"></i></a>-->
									      <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
									    </tr>
									@endif
							  </tbody>
							</table>
							<!--<button href="{{ route('usuario.show', $adm->folio) }}" class="btn btn-success"><span class="fa fa-search" id="search"></span> Ver todos</button>-->
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection