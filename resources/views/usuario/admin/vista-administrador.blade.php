@extends('main')

@section('title','Administrador')

@section('tags')
<div class="row justify-content-end"> 
	<div class="mol-md-8">
		<div class="card">
			<div class="card-folio justify-content-center"><i class="fa fa-coffee"></i> {!! $datos->nombres !!}</div>
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
						<div class="card-header justify-content-center">{{ '  PROGRAMA SOCIAL |  '}} {!!$programa->programa!!} {{'	|	MÓDULO ADMINISTRADOR' }} <i class="fa fa-coffee"></i></div>
						<div class="card-body">
							{!! Form::open((['route' => 'usuario.index','method' => 'GET', 'class' => 'navbar-form'])) !!}
		                        <div class="col-lg-5 offset-md-7">
								    <div class="input-group">
								      <input type="text" class="form-control" placeholder="Buscar por folio o por nombre completo..." name="FOLIO">
								      	<span class="input-group-btn">
								        <button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
								      </span>
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
								</div><!-- /.row -->    		
							{!! Form::close() !!}
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
							  	@foreach($total_usuarios as $usuario)
							  		@if($usuario->folio != 0)
									    <tr>
									      <th>{{ $usuario->folio }}</th>
									      <th>{{ $usuario->usu }}</th>
									      <th>{{ $usuario->nombre_completo }}</th>
									      <th><!--<a href="{{ route('info-personal.edit',$usuario->folio) }}" class="btn btn-info"><i class="fa fa-user"></i></a>
									      <a href="" class="btn btn-primary"><i class="fa fa-globe"></i></a>-->
									      <a href="{{ route('usuario.administrador',$usuario->folio) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
									    </tr>
									@endif
								@endforeach
							  </tbody>
							</table> 
							{!! $total_usuarios->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection