<!--<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8"></meta>
	</head>
	<body>
		<img src="{{ asset('images/Logo-Gobierno.png') }}">
		<h3>SECRETARÍA DE DESARROLLO SOCIAL</h3>
		<h2>INSTITUTO MEXIQUENSE DE LA JUVENTUD</h2>
		<h3>TARJETA DE DESCUENTO FUERZA JOVEN</h3>
		<div>¡Bienvenido!</div>
		<div>Este correo es para confirmar tus datos de registro.</div>
		<h4>{{"Folio de tu tarjeta es:"}} {!! $NuevoRegistro->FOLIO !!}</h4>
		<h4>{{"El correo electrónico es:"}} {!! $NuevoRegistro->LOGIN !!}</h4>
		<h4>{{"Tu contraseña es:"}} {!! $NuevoRegistro->PASSWORD !!}</h4>
		<br>
		<div>Para cualquier duda, observación, crítica constructiva, queja y sugerencia; puedes responder a este correo electrónico.

Excelente día.</div>
	</body>
</html>-->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">	
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.js') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/date-picker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/date-picker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('plugins/date-picker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('plugins/date-picker/locales/bootstrap-datepicker.es.min.js')}}"></script>

</head>
<body>
  	<div>¡Bienvenido!</div>
		<div>Este correo es para confirmar tus datos de registro.</div>
		<h4>{{"Folio de tu tarjeta es:"}} {!! $NuevoRegistro->FOLIO !!}</h4>
		<h4>{{"El correo electrónico es:"}} {!! $NuevoRegistro->LOGIN !!}</h4>
		<h4>{{"Tu contraseña es:"}} {!! $NuevoRegistro->PASSWORD !!}</h4>
		<br>
		<div>Para cualquier duda, observación, crítica constructiva, queja y sugerencia; puedes responder a este correo electrónico.</div>
		<div>Excelente día.</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="mol-md-8">
				<div class="card">
					<div class="card-header justify-content-center"><img src="{{ asset('images/Logo-IMEJ.png') }}" border="0" width="360" height="90"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
	<!--<script src="//code.jquery.com/jquery.js"></script>-->
	<!--<script type="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>-->
	<!--<script type="{{ asset('/js/apartado_a/localidades.js') }}"></script>// <script type="text/javascript" src="RUTA"></script> <-ASI ?-->	
	<!--<script src="/js/apartado-a/id-geo.js"></script>-->
	<script typ="text/javascript" src="/js/apartado_a/localidades.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
    	$('#flash-overlay-modal').modal();
	</script>

</body>
</html>