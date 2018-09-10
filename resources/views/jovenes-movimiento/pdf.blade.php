<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">	
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.js') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    	<!-- Latest compiled and minified JavaScript -->
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    	<!-- Jquery -->
    	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	</head>
	<body>
		
			<div class="justify-content-start">
				<div class="mol-md-10">
					<div class="card">
						<div class="card-header justify-content-center"><img src="{{ asset('images/Logo-Gobierno.png') }}" border="0" width="100" height="30">
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-12">
								<div class="col-md-12 text-md-center">
									SECRETARÍA DE DESARROLLO SOCIAL
								</div>
								<div class="col-md-12 text-md-center">
									Formato Único de Registro (FUR)
								</div>
								<div class="col-md-12 text-md-center">
									Programa de Desarrollo Social
								</div>
	    					</div>
	    					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-12">
								<div class="col-md-12 text-md-left">
									1. IDENTIFICACIÓN GEOGRÁFICA
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									1.1 Clave de Estado: {!! $usuario->cve_entidad_federativa !!}
								</div>
								<div class="col-md-12 text-md-left">
									1.2 Clave de Municipio: {!! $usuario->cve_municipio !!}
								</div>
								<div class="col-md-12 text-md-left">
									1.3 Clave de Localidad: {!! $usuario->cve_localidad !!}
								</div>
								<div class="col-md-12 text-md-left">
									1.4 Clave de AGEB:
								</div>
								<div class="col-md-12 text-md-left">
									1.5 Manzana:
								</div>
								<div class="col-md-12 text-md-left">
									1.6 Lote:
								</div>
								<div class="col-md-12 text-md-left">
									1.7 Fecha de Solicitud (yyyy-mm-dd hh-mm-ss): {!! $usuario->fecha_reg !!}
								</div>
								<div class="col-md-12 text-md-left">
									1.8 Nombre de Localidad: {!! $usuario->localidad !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									2. DIRECCIÓN DE LA VIVIENDA
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									2.1 Calle, Avenida, Callejón, Carretera, Camino, Boulevard, Km: {!! $usuario->calle !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.2 Número Exterior: {!! $usuario->num_ext !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.3 Número Interior: {!! $usuario->num_int !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.4 Colonia, Fraccionamiento, Barrio, Unidad Habitacional: {!! $usuario->colonia !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.5 Código Postal: {!! $usuario->codigo_postal !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.6 Entre la calle... {!! $usuario->entre_calle !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.7 Y la calle... {!! $usuario->y_calle !!}
								</div>
								<div class="col-md-12 text-md-left">
									2.8 Rasgo físico que ayude a ubicar la vivienda (Tienda, río, edificio, arroyo, árbol u otro): {!! $usuario->otra_referencia !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									3. DATOS PERSONALES
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									3.1 Nombre del solicitante
								</div>
								<div class="col-md-12 text-md-left">
									Apellido paterno: {!! $usuario->primer_apellido !!}
								</div>
								<div class="col-md-12 text-md-left">
									Apellido materno: {!! $usuario->segundo_apellido !!}
								</div>
								<div class="col-md-12 text-md-left">
									Nombre(s): {!! $usuario->nombres !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.2 Sexo: {!! $usuario->sexo !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.3 Fecha de nacimiento: {!! $usuario->fecha_nacimiento !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.5 RFC: {!! $usuario->rfc !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.6 Nacionalidad: {!! $usuario->cve_nacionalidad !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.7 CURP: {!! $usuario->curp !!}
								</div>
								<div class="col-md-12 text-md-left">
									Estado Civil: {!! $usuario->cve_estado_civil !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.8 Documentación de identificación: CREDENCIAL PARA VOTAR
								</div>
								<div class="col-md-12 text-md-left">
									3.9 Folio, clave o número del comprobante de identificación oficial: {!! $usuario->folio_id_oficial !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.10 Teléfono fijo (con lada):
								</div>
								<div class="col-md-12 text-md-left">
									3.11 Teléfono celular: {!! $usuario->lada_telefono !!}{!! $usuario->telefono !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.12 Correo electrónico: {!! $usuario->correo_electronico !!}
								</div>
								<div class="col-md-12 text-md-left">
									3.13 Entidad federativa de nacimiento: {!! $usuario->cve_lugar_nacimiento !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									4. DATOS SOCIOECONÓMICOS DEL SOLICITANTE
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									4.1 ¿Es usted el jefe (a) del hogar?: {!! $info->es_jefa !!}
								</div>
								@if($info->es_jefa == 'N')
									<div class="col-md-12 text-md-left">
										Especifique parentesco: {!! $info->parentesco !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.2 ¿Se considera usted indígena?: {!! $info->indigena !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.3 ¿Habla alguna lengua indígena?: {!! $info->habla_lengua_i !!}
								</div>
								@if($info->habla_lengua_i == 'S')
									<div class="col-md-12 text-md-left">
										¿Cuál?: {!! $info->cve_lengua !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.4 ¿Cuál es su estado civil?: {!! $usuario->cve_estado_civil !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.5 ¿Cuántos hijos tiene?: {!! $info->cve_cant !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.6 ¿Usted es repatriado(a)?: {!! $info->repatriado !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.7 Tiempo de radicar en el Estado de México: {!! $info->cve_tiempo_radicar !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.8 ¿usted ha sido víctima u ofendido de algún delito?: {!! $info->es_victima !!}
								</div>
								@if($info->es_victima == 'S')
									<div class="col-md-12 text-md-left">
										¿Cuál?: {!! $info->delito_cual !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.9 ¿Padece alguna enfermedad crónico-degenerativa?: {!! $info->cve_enfermedad !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.10 En caso de ser mujer ¿Actualmente se encuentra embarazada?: {!! $info->embarazada !!}
								</div>
								@if($info->embarazada == 'S')
								<div class="col-md-12 text-md-left">
									¿Meses?: {!! $info->embarazada_meses !!}
								</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.11 ¿El solicitante tiene alguna discapacidad?: {!! $info->cve_discapacidad !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.12 ¿El solicitante está afiliado a alguna institución de salud, cuál?: {!! $info->cve_inst_salud !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.13 ¿El solicitante presenta alguna condición de orfandad?: {!! $info->cve_orfandad !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.14 ¿Qué grado de estudios tiene?: {!! $info->cve_grado_estudios !!}
								</div>
								<div class="col-md-12 text-md-left">
									¿Nombre de la Escuela?: {!! $info->desc_cct !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									INGRESO DEL HOGAR
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									4.15 El hogar se encuentra en: {!! $info->tipo_zona !!}
								</div>
								<div class="col-md-12 text-md-left">
									4. ¿Actualmente trabaja?: {!! $info->trabaja !!}
								</div>
								<div class="col-md-12 text-md-left">
									4. ¿?: {!! $info->sexo !!}
								</div>
	    					</div>
	    				</div>
					</div>
				</div>
			</div>
	  	
	</body>
</html>