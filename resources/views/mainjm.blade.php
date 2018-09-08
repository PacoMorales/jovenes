<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Inicio') | Jóvenes en Movimiento</title>
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/Edomex.png') }}"/>
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
	@include('flash::message')
	<div class="container">
		<div class="justify-content-start">
			<div class="mol-md-8">
				<div class="card">
					<div class="card-header justify-content-center"><img src="{{ asset('images/Logo-Gobierno.png') }}" border="0" width="200" height="60" style="margin-right: 600px;">
					<img src="{{ asset('images/Edomex.png') }}" border="0" width="80" height="60">
					<img src="{{ asset('images/IMEJ.png') }}" border="0" width="135" height="125">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-12">
							<!--<div class="navbar-light navbar-text">-->
								<!--<div class="container-fluid bordetop">-->
									<div class="col-md-12 text-md-center">
										<label style="color: green;"><h4>INSTITUTO MEXIQUENSE DE LA JUVENTUD<h4></label>
									</div>
									<div class="col-md-12 text-md-center">
										<label style="color: gray;"><p>SECRETARÍA DE DESAROLLO SOCIAL</p></label>
									</div>
									
								  	
								  	
								<!--</div>
							</div>-->
							<section>@yield('tags')</section>
    					</div>
    				</div>
				</div>
			</div>
		</div>
  	</div>

	<section>@yield('header')</section>
	<section>@yield('content')</section>

	<!--<br></br>
	<div class="container">
		<div class="row justify-content-center">
			<div class="mol-md-8">
				<div class="card">
					<div class="card-header justify-content-center"><img src="{{ asset('images/Logo-IMEJ.png') }}" border="0" width="360" height="90"></div>
				</div>
			</div>
		</div>
	</div>-->

	<script type="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
	<!--<script src="//code.jquery.com/jquery.js"></script>-->
	<!--<script type="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>-->
	<!--<script type="{{ asset('/js/apartado_a/localidades.js') }}"></script>// <script type="text/javascript" src="RUTA"></script> <-ASI ?-->	
	<!--<script src="/js/apartado-a/id-geo.js"></script>-->
	<script type="text/javascript" src="{{ asset('js/apartado_a/localidades.js') }}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
    	$('#flash-overlay-modal').modal();
	</script>

</body>
</html>