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
                        	<label class="form-check-label" for="encontrado" style="margin-left: 325px;">
                                   <h4>REGISTRO NO ENCONTRADO.</h4>
                            </label>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection