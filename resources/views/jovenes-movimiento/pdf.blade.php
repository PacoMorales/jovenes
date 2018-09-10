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
									1.1 Clave de estado: {!! '$usuario->cve->estado' !!}
								</div>
								<div class="col-md-12 text-md-left">
									1.2 Clave de municipio
								</div>
	    					</div>
	    				</div>
					</div>
				</div>
			</div>
	  	
	</body>
</html>