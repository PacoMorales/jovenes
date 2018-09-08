@extends('main')

@section('title','Datos Sociodemográficos')

@section('tags')
	<div class="row justify-content-end">
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

	{!! Form::open(['route' => 'beneficiario.capturaInfoSoc', 'method' => 'POST']) !!}
 
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header justify-content-center" style="color:green;">{{ '  PROGRAMA SOCIAL |  '}} {!!$programa->programa!!} {{'	|	DATOS SOCIOECONÓMICOS' }} <i class="fa fa-user-tie"></i></div>
						<div class="card-body">

						<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('DEPENDENCIA','Nombre de la Dependencia') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									{!! Form::label('DEP','INSTITUTO MEXIQUENSE DE LA JUVENTUD') !!}
								</div>
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PROGRAMA','Programa Gubernamental') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									{!! $programa->programa !!}
								</div>
							</div>
<!--# COMPROBAR INFORMACION ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'COMPROBAR INFORMACIÓN DEL REGISTRO' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('FOLIO','Folio asignado por sistema') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									<p><input type="text" name="FOLIO" value="{{$usuario->folio}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CORREO','Correo electrónico (e-mail)') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									<p><input type="text" name="LOGIN" value="{{$usuario->login}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>
<!--# ERRORES ###############################################################################################################################################################################################################################################################################-->
							@if(count($errors) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

<!--# DATOS SOCIODEMOGRAFICOS ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'DATOS SOCIODEMOGRÁFICOS DEL(LA) SOLICITANTE' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ES_JEFA','* ¿Es usted jefe(a) del hogar?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ES_JEFA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ES_JEFA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_PARENTESCO','* Parentesco') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_PARENTESCO">									
            							@foreach($parentesco as $pare)
            								<option value="{{ $pare->cve_parentesco }}">{{ $pare->desc_parentesco }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('INDIGENA','* ¿Se considera usted indígena?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="INDIGENA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="INDIGENA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('HABLA_LENGUA_I','* ¿Habla alguna lengua indígena?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="HABLA_LENGUA_I" id="habla-lengua-no" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="HABLA_LENGUA_I" id="habla-lengua-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="habla-lengua">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CANT','* ¿Cuantos hijos tiene?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CANT">
            							@foreach($cantidades as $cantidad)
            								<option value="{{ $cantidad->cve_cant }}">{{ $cantidad->desc_cant }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('REPATRIADO','* ¿Usted es repatriado?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="REPATRIADO" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="REPATRIADO" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_TIEMPO_RADICAR','* ¿Tiempo de radicar en el Estado de México?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_TIEMPO_RADICAR">
            							@foreach($tiempos as $tiempo)
            								<option value="{{ $tiempo->cve_tiempo_radicar }}">{{ $tiempo->desc_tiempo_radicar }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ES_VICTIMA','* ¿Usted ha sido víctima de algún delito?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ES_VICTIMA" checked id="delito-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ES_VICTIMA" id="delito-yes" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="respuesta-delito">

							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ENFERMEDAD','* ¿Padece alguna enfermedad crónico degenerativa?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_ENFERMEDAD">
            							@foreach($enfermedades as $enfermedad)
            								<option value="{{ $enfermedad->cve_enfermedad }}">{{ $enfermedad->desc_enfermedad }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('EMBARAZADA','En caso de ser mujer ¿Actualmente se encuentra embarazada?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="EMBARAZADA" checked id="embarazo-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="EMBARAZADA" id="embarazo-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="respuesta-embarazo">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_DISCAPACIDAD','* ¿Tiene alguna discapacidad?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_DISCAPACIDAD">
            							@foreach($discapacidades as $discapacidad)
            								<option value="{{ $discapacidad->cve_discapacidad }}">{{ $discapacidad->desc_discapacidad }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_INST_SALUD','* ¿Está afiliado(a) a alguna institución de salud?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_INST_SALUD">
            							@foreach($instsalud as $inst_salud)
            								<option value="{{ $inst_salud->cve_inst_salud }}">{{ $inst_salud->desc_inst_salud }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ORFANDAD','* ¿Presenta alguna condición de orfandad?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_ORFANDAD">
            							@foreach($orfandad as $orf)
            								<option value="{{ $orf->cve_orfandad }}">{{ $orf->desc_orfandad }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_GRADO_ESTUDIOS','* ¿Qué grado de estudios tiene?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_GRADO_ESTUDIOS">
            							@foreach($grado_estudios as $grado_estudio)
            								<option value="{{ $grado_estudio->cve_grado_estudios }}">{{ $grado_estudio->grado_estudios }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('DESC_CCT','Nombre de la escuela') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('DESC_CCT',null,['class' => 'form-control']) !!}
								</div>	
							</div>

<!--# INGRESO DEL HOGAR ###############################################################################################################################################################################################################################################################################-->

							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'INGRESO DEL HOGAR' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('TIPO_ZONA','* El hogar se encuentra en') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="TIPO_ZONA">
            							<option value="R">ZONA RURAL</option>
            							<option value="U">ZONA URBANA</option>   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('TRABAJA','* ¿Actualmente trabaja?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="TRABAJA" checked id="trabaja-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="TRABAJA" id="trabaja-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ACTIVIDAD_LABORAL','* Su empleo actual es') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_ACTIVIDAD_LABORAL">
            							@foreach($t_empleo as $tipo_empleo)
            								<option value="{{ $tipo_empleo->cve_tipo_empleo }}">{{ $tipo_empleo->desc_tipo_empleo }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SALARIO','* ¿Cuál es el monto mensual que recibe por ese trabajo?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SALARIO">
            							@foreach($salarios as $salario)
            								<option value="{{ $salario->cve_salario }}">{{ $salario->desc_salario }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ALGUN_INGRESO','* A pesar de no trabajar ¿cuenta con algún ingreso?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ALGUN_INGRESO" checked id="algun-ingreso-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ALGUN_INGRESO" id="algun-ingreso-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="respuesta-tipo">
									
							</div>

							<div class = "form-group row " id="respuesta-monto">
								
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ALQUILER_TERRENO','* ¿En su hogar se reciben ingresos por alquilar algún terrreno o inmueble?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ALQUILER_TERRENO" checked id="alquiler-terreno-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ALQUILER_TERRENO" id="alquiler-terreno-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="respuesta-terreno">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PENSION','* ¿En su hogar se reciben ingresos por jubilación y/o pensiones, de otros hogares, de organizaciones o provenientes de algún otro país?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="PENSION" checked id="pension-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="PENSION" id="pension-si" value="S" style="margin-left:5px;">								
								</div>
							</div>

							<div class = "form-group row" id="respuesta-pension">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SALARIO2','* ¿Cuál es el monto mensual total del hogar (adicional al salario del jefe)?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SALARIO2">
            							@foreach($salarios as $salario)
            								<option value="{{ $salario->cve_salario }}">{{ $salario->desc_salario }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_DEPEN_ECONOM','* ¿Cuántos dependientes económicos hay en su hogar?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_DEPEN_ECONOM">
            							@foreach($dependientes as $dependiente)
            								<option value="{{ $dependiente->cve_depen_econom }}">{{ $dependiente->desc_depen_econom }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_PARENTESCO2','* Parentesco de los dependientes economicos') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_PARENTESCO2">									
            							@foreach($parentesco as $pare)
            								<option value="{{ $pare->cve_parentesco }}">{{ $pare->desc_parentesco }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('RECIBE_APOYO','* ¿Actualmente algún integrante del hogar cuenta con el apoyo de algún programa social?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="RECIBE_APOYO" checked id="apoyo-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="RECIBE_APOYO" id="apoyo-si" value="S" style="margin-left:5px;">								
								</div>
							</div>

							<div class = "form-group row" id="respuesta-cual">
									
							</div>

							<div class = "form-group row" id="respuesta-cuantos">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CANT2','* ¿Cuántas personas viven en esta vivienda (contando niños y ancianos)?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CANT2">
            							@foreach($cantidades as $cantidad)
            								<option value="{{ $cantidad->cve_cant }}">{{ $cantidad->desc_cant }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>
<!--# INGRESO DEL(A) JOVEN ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'INGRESO DEL(A) JOVEN' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('TIPO_ZONA3','* El hogar se encuentra en') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="TIPO_ZONA3">
            							<option value="R">ZONA RURAL</option>
            							<option value="U">ZONA URBANA</option>   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('TRABAJA2','* ¿Actualmente trabaja?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="TRABAJA2" checked id="trabaja-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="TRABAJA2" id="trabaja-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SALARIO4','¿Cuál es el monto mensual que recibe por ese trabajo?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SALARIO4">
            							@foreach($salarios as $salario)
            								<option value="{{ $salario->cve_salario }}">{{ $salario->desc_salario }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ESTUDIA','* ¿Actualmente se encuentra estudiando?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ESTUDIA" checked id="estudia-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ESTUDIA" id="estudia-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('RECIBE_INGRESO','* ¿Recibe algún ingreso por parte del jefe(a) del hogar?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="RECIBE_INGRESO" checked id="ingreso-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="RECIBE_INGRESO" id="ingreso-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="ingreso">
									
							</div>

							<div class = "form-group row" id="beca">
									
							</div>

							<div class = "form-group row" id="periodicidad">
									
							</div>

							<div class = "form-group row" id="monto-beca">
									
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MONTO_TRANSPORTE','* Monto mensual que gasta en transporte') !!}
								</div>
								<div class="col-md-6 offset-md-1">
									{!! Form::text('MONTO_TRANSPORTE',0,['class' => 'form-control','placeholder' => 'Ej. 500','required']) !!}
								</div>	
							</div>

							<div class = "form-group row" id="traslado">
									
							</div>
<!--# ALIMENTACION ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'ALIMENTACIÓN' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CANT3','¿Cuántos hogares o grupos de presonas tienen gasto separado para comer, contando el de usted?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CANT3">
            							@foreach($cantidades as $cantidad)
            								<option value="{{ $cantidad->cve_cant }}">{{ $cantidad->desc_cant }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('COMPARTEN_GASTOS','* ¿Todas las personas que viven en la vivienda comparten un mismo gasto para comer?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="COMPARTEN_GASTOS" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="COMPARTEN_GASTOS" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_SINCOMIDA','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un adulto se quedó sin comida?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_SINCOMIDA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_SINCOMIDA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_SINTIOHAMBRE','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o algún adulto en su hogar sintió hambre pero no comió?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_SINTIOHAMBRE" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_SINTIOHAMBRE" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_PVA','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor tuvo poca variedad en sus alimentos?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_PVA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_PVA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_COMIO','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar sólo comió una vez al día o dejó de comer todo un día?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_COMIO" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_COMIO" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_PVA','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar tuvo una alimentación basada en muy poca variedad de alimentos?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_PVA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_PVA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('LIMOSNA','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez tuvieron que hacer algo que hubieran preferido no hacer para conseguir comida, tal como pedir limosna o mandar a los niños a trabajar?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="LIMOSNA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="LIMOSNA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_SINCENAR','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar dejó de desayunar, comer o cenar?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_SINCENAR" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_SINCENAR" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_COMIO','* En los últimos tres meses, por falta de dinero o recursos ¿algún menor comió sólo una vez al día o dejó de comer todo un día?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_COMIO" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_COMIO" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('ADULTO_COMIOMENOS','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar comió menos de lo que su usted piensa que debía comer?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="ADULTO_COMIOMENOS" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="ADULTO_COMIOMENOS" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_COMIOMENOS','* En los últimos tres meses, por falta de dinero o recursos ¿algún menor comió menos de lo que debería comer?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_COMIOMENOS" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_COMIOMENOS" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_SINTIOHAMBRE','* En los últimos tres meses, por falta de dinero o recursos ¿algún menor sintió hambre pero no comió?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_SINTIOHAMBRE" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_SINTIOHAMBRE" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_MENOSCOMIDA','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor se le tuvo que servir menos comida?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_MENOSCOMIDA" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_MENOSCOMIDA" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('MENOR_ACOSTOHAMBRE','* En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor se tuvo que acostar con hambre?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="MENOR_ACOSTOHAMBRE" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="MENOR_ACOSTOHAMBRE" value="S" style="margin-left:5px;">								
								</div>	
							</div>
<!--# CARACTERÍSTICAS DE LA VIVIENDA ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center">{{ 'CARACTERÍSTICAS DE LA VIVIENDA' }}</div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CASADONDEVIVE_ES','* La casa donde vive es') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CASADONDEVIVE_ES">
            							@foreach($casas as $casa)
            								<option value="{{ $casa->cve_casadondevive_es }}">{{ $casa->desc_casadondevive_es }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_MATERIAL','* ¿De qué material es la mayor parte del techo de esta vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_MATERIAL">
            							@foreach($materiales as $material)
            								<option value="{{ $material->cve_material }}">{{ $material->desc_material }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_MATERIAL2','* ¿De qué material es la mayor parte de las paredes o muros de esta vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_MATERIAL2">
            							@foreach($materiales as $material)
            								<option value="{{ $material->cve_material }}">{{ $material->desc_material }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_MATERIAL3','* ¿De qué material es la mayor parte del piso de esta vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_MATERIAL3">
            							@foreach($materiales as $material)
            								<option value="{{ $material->cve_material }}">{{ $material->desc_material }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CUARTOS','* ¿Cuántos cuartos tiene en total esta vivienda (sin contar pasillos ni baños)?') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CUARTOS',0,['class' => 'form-control','required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CUARTOS_DORMIR','¿Cuántos cuartos se usan para dormir (sin contar pasillos ni baños)?') !!}
								</div>
								<div class="col-md-4 offset-md-1">
									{!! Form::text('CUARTOS_DORMIR',0,['class' => 'form-control','required']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SERVICIO_AGUA','* ¿Qué tipo de servicio de agua tiene la vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SERVICIO_AGUA">
            							@foreach($servicios_a as $servicio)
            								<option value="{{ $servicio->cve_servicio_agua }}">{{ $servicio->desc_servicio_agua }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('EXCUSADO','* ¿Tienen excusado, retrete, sanitario, letrina u hoyo negro?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="EXCUSADO" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="EXCUSADO" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('SANITARIO','* ¿El servicio de sanitario lo comparten con otra vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="SANITARIO" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="SANITARIO" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SERVICIO_SANDREN','* El servicio sanitario') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SERVICIO_SANDREN">
            							@foreach($sandren as $serv)
            								@if($serv->cve_servicio_sandren >= 0 && $serv->cve_servicio_sandren <= 3)
            									<option value="{{ $serv->cve_servicio_sandren }}">{{ $serv->desc_servicio_sandren }}</option>
            								@endif
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SERVICIO_SANDREN2','* ¿Cuántos baños tiene esta vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SERVICIO_SANDREN2">
            							@foreach($sandren as $serv)
            								@if($serv->cve_servicio_sandren == 0 || ($serv->cve_servicio_sandren >= 4 && $serv->cve_servicio_sandren <= 6))
            									<option value="{{ $serv->cve_servicio_sandren }}">{{ $serv->desc_servicio_sandren }}</option>
            								@endif
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SERVICIO_SANDREN3','* Esta vivienda tiene drenaje o desagüe conectado a') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SERVICIO_SANDREN3">
            							@foreach($sandren as $serv)
            								@if($serv->cve_servicio_sandren == 0 || ($serv->cve_servicio_sandren >= 7 && $serv->cve_servicio_sandren <= 11))
            									<option value="{{ $serv->cve_servicio_sandren }}">{{ $serv->desc_servicio_sandren }}</option>
            								@endif
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_SERVICIO_LUZ','* El servicio de luz eléctrica lo obtienen de') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_SERVICIO_LUZ">
            							@foreach($servicio_l as $serv)
            									<option value="{{ $serv->cve_servicio_luz }}">{{ $serv->desc_servicio_luz }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_COMBUSTIBLE','* Combustible utilizado para cocinar') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_COMBUSTIBLE">
            							@foreach($combustibles as $combustible)
            									<option value="{{ $combustible->cve_combustible }}">{{ $combustible->desc_combustible }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('FOGON','* ¿La estufa (fogón) de leña o carbón con la que cocinan, tiene chimenea o algún ducto para sacar el humo de esta vivienda?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="FOGON" checked value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="FOGON" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('PREGUNTA','* Esta vivienda cuenta con') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<input type="checkbox" name="LAVADERO" value="S" style="margin-right:5px;"><label>LAVADERO</label><br>
									<input type="checkbox" name="TARJA" value="S" style="margin-right:5px;"><label>FREGADERO O TARJA</label><br>
									<input type="checkbox" name="REGADERA" value="S" style="margin-right:5px;"><label>REGADERA</label><br>
									<input type="checkbox" name="TINACO" value="S" style="margin-right:5px;"><label>TINACO</label><br>
									<input type="checkbox" name="CISTERNA" value="S" style="margin-right:5px;"><label>CISTERNA O ALJIBE</label><br>
									<input type="checkbox" name="PILETA" value="S" style="margin-right:5px;"><label>PILETA O DEPÓSITO DE AGUA</label><br>
									<input type="checkbox" name="CALENTADOR_SOLAR" value="S" style="margin-right:5px;"><label>CALENTADOR SOLAR DE AGUA</label><br>
									<input type="checkbox" name="CALENTADOR_GAS" value="S" style="margin-right:5px;"><label>CALENTADOR DE GAS U OTROS</label><br>
									<input type="checkbox" name="MEDIDOR_LUZ" value="S" style="margin-right:5px;"><label>MEDIDOR DE LUZ</label><br>
									<input type="checkbox" name="BOMBA_AGUA" value="S" style="margin-right:5px;"><label>BOMBA DE AGUA</label><br>
									<input type="checkbox" name="TANQUE_GAS" value="S" style="margin-right:5px;"><label>TANQUE DE GAS ESTACIONARIO</label><br>
									<input type="checkbox" name="AIRE_ACOND" value="S" style="margin-right:5px;"><label>AIRE ACONDICIONADO</label><br>
									<input type="checkbox" name="CALEFACCION" value="S" style="margin-right:5px;"><label>CALEFACCIÓN</label><br>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CANT4','* ¿Cuántos integrantes de su hogar comparten cuarto dormitorio (sin contar pasillos)?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CANT4">
            							@foreach($cantidades as $cantidad)
            								<option value="{{ $cantidad->cve_cant }}">{{ $cantidad->desc_cant }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_CASADONDEVIVE_ES2','* Esta vivienda es') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_CASADONDEVIVE_ES2">
            							@foreach($casas as $casa)
            								<option value="{{ $casa->cve_casadondevive_es }}">{{ $casa->desc_casadondevive_es }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('AFECTADA','* ¿Esta vivienda ha sido afectada por algún fenómeno natural?') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<label for="NO">NO</label><input type="radio" name="AFECTADA" checked id="afectada-no" value="N" style="margin-left:5px;">
									<label for="SI">SI</label><input type="radio" name="AFECTADA" id="afectada-si" value="S" style="margin-left:5px;">								
								</div>	
							</div>

							<div class = "form-group row" id="respuesta-fenomeno">
								
							</div>

							<div class = "form-group row">
								<div class="col-md-5 col-form-label text-md-right">
									{!! Form::label('CVE_ORIGEN','* Origen de la solicitud') !!}
								</div>
								<div class="col-md-5 offset-md-1">
									<select class="form-control m-bot15" name="CVE_ORIGEN">
            							@foreach($origenes as $origen)
            								<option value="{{ $origen->cve_origen }}">{{ $origen->desc_origen }}</option>
            							@endforeach   
									</select>
								</div>	
							</div>

<!--# BOTON CONTINUAR ###############################################################################################################################################################################################################################################################################-->
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									{!! Form::submit('Terminar!',['class' => 'btn btn-success']) !!}
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@endsection