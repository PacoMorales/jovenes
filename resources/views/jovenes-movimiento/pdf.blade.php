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
									4.16 ¿Actualmente trabaja?: {!! $info->trabaja !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.17 Su empleo actual es: {!! $info->cve_tipo_empleo !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.18 ¿En qué trabaja?: {!! $info->cve_actividad_laboral !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.19 ¿Cuál es el monto mensual que recibe por ese trabajo?: {!! $info->cve_salario !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.20 ¿A pesar de no trabajar cuenta con algún ingreso?: {!! $info->algun_ingreso !!}
								</div>
								@if($info->algun_ingreso == 'S')
									<div class="col-md-12 text-md-left">
										¿De qué tipo?: {!! $info->algun_ingreso_tipo !!}
									</div>
									<div class="col-md-12 text-md-left">
										Monto: {!! $info->algun_ingreso_monto !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.21 ¿En su hogar se reciben ingresos por alquilar algún terreno o inmueble?: {!! $info->alquiler_terreno !!}
								</div>
								@if($info->alquiler_terreno == 'S')
									<div class="col-md-12 text-md-left">
										Monto: {!! $info->alquiler_terreno_monto !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.22 ¿En su hogar se reciben ingresos por jubilaciones y/o pensiones, de otros hogares, de organizaciones o provenientes de algún otro país?: {!! $info->pension !!}
								</div>
								@if($info->pension == 'S')
									<div class="col-md-12 text-md-left">
										Monto: {!! $info->pension_monto !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.23 ¿Cuál es el ingreso total mensual del hogar? (Adicional al salario del jefe): {!! $info->cve_salario2 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.24 ¿Cuántos dependientes económicos hay en el hogar?: {!! $info->cve_depen_ecomon !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.25 Parentesco de los dependientes económicos, respecto al jefe del hogar: {!! $info->cve_parentesco2 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.26 ¿Actualmente algún integrante del hogar cuenta con el apoyo de algún programa de desarrollo social?: {!! $info->recibe_apoyo !!}
								</div>
								@if($info->recibe_apoyo == 'S')
									<div class="col-md-12 text-md-left">
										¿Cuántos?: {!! $info->cuantos_apoyos !!}
									</div>
									<div class="col-md-12 text-md-left">
										¿Cuáles?: {!! $info->sexo->cual_apoyo !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.27 ¿Cuántas personas viven normalmente en esta vivienda, contando a los niños y a los ancianos?: {!! $info->cve_cant2 !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									INGRESO DEL(A) JOVEN
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									4.33 El domicilio del solicitante se encuentra en: {!! $info->tipo_zona3 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.34 ¿Actualmente trabaja?: {!! $info->trabaja2 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.35 ¿Cuál es el monto del pago mensual que recibe?: {!! $info->cve_salario4 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.36 ¿Actualmente se encuentra usted estudiando?: {!! $info->estudia !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.37 ¿Recibe usted algún ingreso por parte del jefe(a) del hogar?: {!! $info->recibe_ingreso !!}
								</div>
								@if($info->recibe_ingreso == 'S')
									<div class="col-md-12 text-md-left">
										4.38 ¿Cuál es el monto mensual del ingreso que recibe por parte del jefe del hogar?: {!! $info->cve_salario5 !!}
									</div>
								@endif
								@if($info->estudia== 'S')
									<div class="col-md-12 text-md-left">
										4.39 ¿Tiene beca escolar?: {!! $info->beca !!}
									</div>
									<div class="col-md-12 text-md-left">
										4.40 La periodicidad del ingreso que recibe por beca es: {!! $info->cve_per_ingreso !!}
									</div>
									<div class="col-md-12 text-md-left">
										4.41 Monto que recibe de la beca: {!! $info->monto_beca !!}
									</div>
								@endif
								<div class="col-md-12 text-md-left">
									4.42 ¿Monto mensual que gasta el solicitante en transporte?: {!! $info->transporte !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.43 ¿Cuál es el tiempo de traslado a la escuela?: {!! $info->cve_tiempo !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									ALIMENTACIÓN
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									4.44 ¿Cuántos hogares o grupos de personas tienen gasto separado para comer, contandeo el de usted?: {!! $info->cve_cant3 !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.45 ¿Todas las personas que viven en esta vivienda comparten un mismo gasto para comer?: {!! $info->comparten_gastos !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.46 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un adulto se quedó sin comida?: {!! $info->adulto_sincomida !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.47 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o algún madulto en su hogar sintió hambre pero no comió?: {!! $info->adulto_sintiohambre !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.48 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor tuvo poca variedad en sus alimentos?: {!! $info->menor_pva !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.49 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar sólo comió una vez al día o dejó de comer en todo un día?: {!! $info->adulto_comio !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.50 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar tuvo una alimentación basada en muy poca variedad de alimentos?: {!! $info->adulto_pva !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.51 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez tuvieron que hacer algo que hubieran preferido no hacer para conseguir comida, tal como pedir limosna o mandar a los niños a trabajar?: {!! $info->limosna !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.52 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar dejó de desayunar, comer o cenar?: {!! $info->adulto_sincenar !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.53 En los últimos tres meses, por falta de dinero o recursos ¿algún menor comió sólo una vez al día o dejó de comer en todo un día?: {!! $info->menor_comio !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.54 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez usted o un adulto en su hogar comió menos de lo que usted piensa que debía comer?: {!! $info->adulto_comiomenos !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.55 En los últimos tres meses, por falta de dinero o recursos ¿algún menor comió menos de lo que debería comer?: {!! $info->menor_comiomenos !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.56 En los últimos tres meses, por falta de dinero o recursos ¿algún menor sintió hambre pero no comió?: {!! $info->menor_sintiohambre !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.57 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor se le tuvo que servir menos comida?: {!! $info->menor_menoscomida !!}
								</div>
								<div class="col-md-12 text-md-left">
									4.58 En los últimos tres meses, por falta de dinero o recursos ¿alguna vez un menor se tuvo que acostar con hambre?: {!! $info->menor_acostarhambre !!}
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									6. CARACTERÍSTICAS DE LA VIVIENDA
								</div>
								<br>
								<div class="col-md-12 text-md-left">
									6.1 La casa donde vive es: {!! $info->cve_casadondevive_es !!}
								</div>
								<div class="col-md-12 text-md-left">
									6.2 ¿De qué material es la mayor parte del techo de esta vivienda?: {!! $info->cve_material !!}
								</div>
								<div class="col-md-12 text-md-left">
									6.3 ¿De qué material es la mayor parte de las paredes o muros de esta vivienda?: {!! $info->cve_material2 !!}
								</div>
								<div class="col-md-12 text-md-left">
									6.4 ¿De qué material es la mayor parte del piso de esta vivienda?: {!! $info-> !!}
								</div>
	    					</div>
	    				</div>
					</div>
				</div>
			</div>
	  	
	</body>
</html>