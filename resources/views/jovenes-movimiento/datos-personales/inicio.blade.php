@extends('main')

@section('title','Datos Personales')

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

	{!! Form::open(['route' => 'beneficiario.capturaInfoPer', 'method' => 'POST']) !!}

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header justify-content-center" style="color: gray;">{{ '  PROGRAMA SOCIAL |  JÓVENES EN MOVIMIENTO		|	APARTADO A 	| DATOS PERSONALES' }} <i class="fa fa-user"></i></div>
						<div class="card-body">
							
							<div class = "form-group row" style="color: green;">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('DEPENDENCIA','Nombre de la Dependencia') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									{!! Form::label('DEP','INSTITUTO MEXIQUENSE DE LA JUVENTUD') !!}
								</div>
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PROGRAMA','Programa Gubernamental') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									{!! $programa->programa !!}
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
<!--# COMPROBAR INFORMACION ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center text-md-center" style="color: gray;">{{ 'COMPROBAR INFORMACIÓN DEL REGISTRO' }} <i class="fa fa-check-circle"></i></div>
									</div>
								</div>
							</div>

							<br>

							<div class = "form-group row" style="color: green;">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('FOLIO','Folio asignado por sistema') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<p><input type="text" name="FOLIO" value="{{$usuario->folio}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>

							<div class = "form-group row" style="color: green;">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CORREO','Correo electrónico (e-mail)') !!}
								</div>
								<div class="col-md-6 offset-md-0">
									<p><input type="text" name="LOGIN" value="{{$usuario->login}}" style="background-color:rgba(213,222,223,.2);border:none; color:gray" readonly="readonly">  (No editable)</p>
								</div>	
							</div>
<!--# IDENTIFICACION GEOGRAFICA ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center" style="color: gray;">{{ 'IDENTIFICACIÓN GEOGRÁFICA' }} <i class="fa fa-globe"></i></div>
									</div>
								</div>
							</div>
							<br>
							<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:brown;">
									{!! Form::label('MENSAJE','Los campos marcados con un asterisco son OBLIGATORIOS.') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('MUNICIPIO','* Municipio') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="municipio" id="municipio" required>									
            							<option selected="true" disabled="disabled" value="">SELECCIONE MUNICIPIO</option>
            							@foreach($municipios as $municipio)
            								<option value="{{ $municipio->municipioid }}">{{ $municipio->municipionombre }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LOCALIDAD','* Localidad') !!}
								</div>
								<div class="col-md-4 offset-md-0">								
									<select class="form-control m-bot15" name="localidad" id="localidad" required>
            							<option selected="true" disabled="disabled" value="" selected>SELECCIONE LOCALIDAD</option>
									</select> 
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('SECCION','* Sección') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="seccion" id="seccion" required>
            							<option selected="true" disabled="disabled" value="" selected>SELECCIONE SECCIÓN</option>			            			
									</select>
								</div>	
							</div> 

<!--# DATOS DE LA VIVIENDA ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center" style="color: gray;">{{ 'DATOS DE LA VIVIENDA' }} <i class="fa fa-home"></i></div>
									</div>
								</div>
							</div>
							<br>
							<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:brown;">
									{!! Form::label('MENSAJE','Los campos marcados con un asterisco son OBLIGATORIOS.') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CALLE','* Calle') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('CALLE',null,['class' => 'form-control','placeholder' => 'Ej. 2 de Noviembre' ,'required','maxlength' => '50','onkeypress'=>'return soloAlfa(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NUM_EXT','Número exterior') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('NUM_EXT',null,['class' => 'form-control','placeholder' => 'Ej. 505','onkeypress'=>'return soloNumeros(event)']) !!}<h6 style="color:red;">(Sólo números)</h6>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NUM_INT','Número interior') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('NUM_INT',null,['class' => 'form-control','placeholder' => 'Ej. 3A','onkeypress'=>'return soloNumeros(event)']) !!}<h6 style="color:red;">(Sólo números)</h6>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('ENTRE_CALLE','Entre calle') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('ENTRE_CALLE',null,['class' => 'form-control','placeholder' => 'Ej. Ignacio zaragoza','maxlength' => '50','onkeypress'=>'return soloAlfa(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('Y_CALLE','Y calle') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('Y_CALLE',null,['class' => 'form-control','placeholder' => 'Ej. Adolfo lópez mateos','maxlength' => '50','onkeypress'=>'return soloAlfa(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('OTRA_REFERENCIA','* Otra referencia') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('OTRA_REFERENCIA',null,['class' => 'form-control','placeholder' => 'Ej. En la entrada están 2 arboles','required','maxlength' => '100','onkeypress'=>'return soloAlfa(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('COLONIA','* Colonia') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('COLONIA',null,['class' => 'form-control','placeholder' => 'Ej. Centro Histórico' ,'required','maxlength' => '50','onkeypress'=>'return soloAlfa(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CODIGO_POSTAL','* Código postal') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('CODIGO_POSTAL',null,['class' => 'form-control','placeholder' => 'Ej. 50101' ,'required','maxlength' => '5','onkeypress'=>'return soloNumeros(event)']) !!}<h6 style="color:red;">(Sólo números)</h6>
								</div>	
							</div>
<!--# DATOS PERSONALES ###############################################################################################################################################################################################################################################################################-->
							<div class="justify-content-center">
								<div class="mol-md-8">
									<div class="card">
										<div class="card-header justify-content-center  text-md-center" style="color: gray;">{{ 'DATOS PERSONALES' }} <i class="fa fa-user"></i></div>
									</div>
								</div>
							</div>
							<br>
							<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:brown;">
									{!! Form::label('MENSAJE','Los campos marcados con un asterisco son OBLIGATORIOS.') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:blue;">
									{!! Form::label('MENSAJE','Los campos de PRIMER APELLIDO, SEGUNDO APELLIDO y NOMBRE(S) se escriben sin acentos.') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('PRIMER_APELLIDO','* Primer apellido') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('PRIMER_APELLIDO',null,['class' => 'form-control','placeholder' => 'Ej. Gonzalez' ,'required','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('SEGUNDO_APELLIDO','Segundo apellido') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('SEGUNDO_APELLIDO',null,['class' => 'form-control','placeholder' => 'Ej. Salgado','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NOMBRES','* Nombre(s)') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('NOMBRES',null,['class' => 'form-control','placeholder' => 'Ej. Israel' ,'required','maxlength' => '50','onkeypress'=>'return soloLetras(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('SEXO','* Sexo') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<p><input type="radio" name="sexo" checked value="H" style="margin-right:5px;">Hombre
									<input type="radio" name="sexo" value="M" style="margin-right:5px;">Mujer</p>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('FECHA_NACIMIENTO','* Fecha de nacimiento') !!}
								</div>

								
			                        <!--<div class="form-group">-->
			                            
			                            <div class="col-md-2 offset-md-0">
			                                <input type="text" class="form-control datepicker" name="FECHA_NACIMIENTO" placeholder="dd/mm/aaaa" required>
			                                <div class="input-group-addon">
			                                    <span class="glyphicon glyphicon-th"></span>
			                                </div>
			                            </div>
			                        <!--</div>-->
			                        
			                    

								<!--<div class="col-md-4 offset-md-1">
									{!! Form::text('FECHA_NACIMIENTO',null,['class' => 'form-control','placeholder' => 'dd/mm/aaaa' ,'required']) !!}
								</div>-->	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CVE_ESTADO_CIVIL','* Estado civil') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="estado_civil" required>
            							<option selected="true" disabled="disabled" value="">SELECCIONE ESTADO CIVIL</option>
            							@foreach($edo_civil as $ec)
            								@if($ec->cve_estado_civil == 1)
            									<option value="{{ $ec->cve_estado_civil }}" selected>{{ $ec->estado_civil }}</option>
            								@else
            									<option value="{{ $ec->cve_estado_civil }}">{{ $ec->estado_civil }}</option>
            								@endif
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CURP','* CURP') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('CURP',null,['class' => 'form-control','placeholder' => '18 dígitos' ,'required','minlength'=>"18",'maxlength'=>"18",'onkeypress'=>'return soloAlfaSE(event)','onblur'=>"document.getElementById('rfc').value=[(this.value[0])+(this.value[1])+(this.value[2])+(this.value[3])+(this.value[4])+(this.value[5])+(this.value[6])+(this.value[7])+(this.value[8])+(this.value[9])]"]) !!}
								</div>	
							</div>
							<!--<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:blue;">
									{!! Form::label('MENSAJE','Ingresa tu RFC únicamente si lo tienes. De no tenerlo, deja el campo en blanco.') !!}
								</div>
							</div>-->
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('RFC','RFC') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('RFC',null,['class' => 'form-control','placeholder' => '10 dígitos','id' => 'rfc','minlength'=>"10",'maxlength'=>"10",'onkeypress'=>'return soloAlfaSE(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('NACIONALIDAD','* Nacionalidad') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="nacionalidad" required>
            							<option selected="true" disabled="disabled" value="">SELECCIONE NACIONALIDAD</option>
            							@foreach($nacionalidad as $nacion)
            								@if($nacion->cve_nacionalidad == 126)
            									<option value="{{ $nacion->cve_nacionalidad }}" selected>{{ $nacion->desc_nacionalidad }}</option>
            								@else
            									<option value="{{ $nacion->cve_nacionalidad }}">{{ $nacion->desc_nacionalidad }}</option>
            								@endif
            							@endforeach    
									</select>
								</div>	
							</div>
							<div class = "form-group row">
								<div class="col-md-12 col-form-label text-md-center" style="color:blue;">
									{!! Form::label('MENSAJE','Escribe tu clave de identificación oficial únicamente si eres MAYOR DE EDAD.') !!}
								</div>
							</div>
							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CVE_ID_OFICIAL','Clave de identificación oficial') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('CVE_ID_OFICIAL',null,['class' => 'form-control','placeholder' => 'Únicamente si eres mayor de edad','maxlength' => '25','onkeypress'=>'return soloAlfaSE(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('LADA_TELEFONO','* Lada') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('LADA_TELEFONO',null,['class' => 'form-control','placeholder' => 'Ej. 712' ,'required','maxlength'=>"3",'minlength' => "1",'onkeypress'=>'return soloNumeros(event)']) !!}<h6 style="color:red;">(Sólo números)</h6>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('TELEFONO','* Teléfono') !!}
								</div>
								<div class="col-md-2 offset-md-0">
									{!! Form::text('TELEFONO',null,['class' => 'form-control','placeholder' => 'Ej. 5407320' ,'required','maxlength'=>"8",'minlength' => "7",'onkeypress'=>'return soloNumeros(event)']) !!}<h6 style="color:red;">(Sólo números)</h6>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CVE_RED_SOCIAL','Red social más utilizada') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="CVE_RED_SOCIAL">
            							<option selected="true" disabled="disabled" value="">SELECCIONE RED SOCIAL</option>
            							@foreach($redes as $red)
            								<option value="{{ $red->cve_red_social }}">{{ $red->red_social }}</option>
            							@endforeach    
									</select>
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('RED_SOCIAL','Cuenta de red social') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									{!! Form::text('RED_SOCIAL',null,['class' => 'form-control','placeholder' => 'Ej. @Israel_Salgado','maxlength' => '50','onkeypress'=>'return soloCuentas(event)']) !!}
								</div>	
							</div>

							<div class = "form-group row">
								<div class="col-md-6 col-form-label text-md-right">
									{!! Form::label('CVE_LUGAR_NACIMIENTO','* Entidad de nacimiento') !!}
								</div>
								<div class="col-md-4 offset-md-0">
									<select class="form-control m-bot15" name="cve_entidad_federativa" required>
            							<option selected="true" disabled="disabled" value="">SELECCIONE ENTIDAD FEDERATIVA</option>
            							@foreach($entidad_fed as $ef)
            								@if($ef->cve_entidad_federativa==15)
            									<option value="{{ $ef->cve_entidad_federativa }}" selected>{{ $ef->entidad_federativa }}</option>
            								@else
            									<option value="{{ $ef->cve_entidad_federativa }}">{{ $ef->entidad_federativa }}</option>
            								@endif
            							@endforeach    
									</select>
								</div>	
							</div>
<!--# BOTON CONTINUAR ###############################################################################################################################################################################################################################################################################-->
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

	<script type="text/javascript">
		$(document).ready(function(){
			$("#municipio").on('change', function(){
				var mun = $(this).val();
				//alert(mun);
				if(mun) {
					$.ajax({
						url: '/jovenes-en-movimiento/localidades/'+mun,
						type: "GET",
						dataType: "json",
						success:function(data){
							$("#localidad").empty();
							//var aux = data;
							//alert(data.length);
							var html_select = '<option value="">SELECCIONE LOCALIDAD</option>';
							for (var i=0; i<data.length ;++i)
								html_select += '<option value="'+data[i].cve_localidad+'">'+data[i].desc_localidad+'</option>';
							$('#localidad').html(html_select);
						}
					});
				}else{
					var html_select = '<option value="">SELECCIONE LOCALIDAD</option>';
					$("#localidad").html(html_select);
				}
			});

			$("#municipio").on('change', function(){
				var mun = $(this).val();
				//alert(mun);
				//var ruta = "{{ route('info-personal.secciones',['id' => "+.mun.+"]) }}";
				//alert(ruta);
				if(mun) {
					$.ajax({
						/*url: 'public/fuerza-joven/info-personal/'+mun+'/secciones',*/
						url: '/jovenes-en-movimiento/secciones/'+mun,
						type: "GET",
						dataType: "json",
						success:function(data){
							$("#seccion").empty();
							//var aux = data;
							//alert(data.length);
							var html_select = '<option value="">SELECCIONE SECCIÓN</option>';
							for (var i=0; i<data.length ;++i)
								html_select += '<option value="'+data[i].seccion+'">'+data[i].seccion+'</option>';
							$('#seccion').html(html_select);
						}
					});
				}else{
					var html_select = '<option value="">SELECCIONE SECCIÓN</option>';
					$("#seccion").html(html_select);
				}
			});
		});
	</script>

<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: "01/01/1989",
        endDate: "31/12/2006",
        startView: 2,
        maxViewMode: 2,
        clearBtn: true,
        language: "es",
        autoclose: true
    });
</script>

<script>
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "1234567890";
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
    function soloAlfa(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
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
    function soloAlfaSE(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
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
    function soloCuentas(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789_-@";
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

	{!! Form::close() !!}
@endsection

@section('scripts')
	<script src="/js/apartado-a/id-geo.js"></script>
@endsection