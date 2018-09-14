function carga_localidades(municipio_id){ 
	if(! municipio_id){
		$('#localidad').html('<option value="">SELECCIONE LOCALIDAD</option>');
	}
	// AJAX
	$.get('/jovenes-en-movimiento/info-personal/'+municipio_id+'/localidades', function (data){ 
	var html_select = '<option value="">SELECCIONE LOCALIDAD</option>';
	for (var i=0; i<data.length ;++i)
		html_select += '<option value="'+data[i].cve_localidad+'">'+data[i].desc_localidad+'</option>';
		$('#localidad').html(html_select);
	});
}
function carga_secciones(localidad_id){
	//alert(localidad_id);
	if(! localidad_id){
		$('#seccion').html('<option value="">SELECCIONE SECCIÓN</option>');
	}
	// AJAX
	$.get('/jovenes-en-movimiento/info-personal/'+localidad_id+'/secciones', function (data){ 
	var html_select = '<option value="">SELECCIONE SECCIÓN</option>';
	for (var i=0; i<data.length ;++i)
		html_select += '<option value="'+data[i].seccion+'">'+data[i].seccion+'</option>';
		$('#seccion').html(html_select);
	});
}

function validarCP(){
	var user = getElementById("cp").value;
	if (user == ""){
		return false;
	}
}
$(document).ready(function(){
	$("#municipio2").change(function(){
		carga_localidades($("#municipio").val());
	});
	$("#municipio2").change(function(){
		carga_secciones($("#municipio").val());
	});

	document.getElementById("habla-lengua-no").checked=true;
	$("#habla-lengua-si").change(function(){
		$("#habla-lengua").load("/jovenes/public/js/apartado_a/Contenido/contenido-lengua.php");
	});	
	$("#habla-lengua-no").change(function(){
		$("#habla-lengua").html("");///abre
	});
	
	document.getElementById("delito-no").checked=true;
	$("#delito-yes").change(function(){
		$("#respuesta-delito").load("/jovenes/public/js/apartado_a/Contenido/contenido_asalto.php");
	});	
	$("#delito-no").change(function(){
		$("#respuesta-delito").html("");///abre
	});

	document.getElementById("embarazo-no").checked=true;
	$("#embarazo-si").change(function(){
		$("#respuesta-embarazo").load("/jovenes/public/js/apartado_a/Contenido/contenido_embarazo.php");
	});	
	$("#embarazo-no").change(function(){
		$("#respuesta-embarazo").html("");///abre
	});

	document.getElementById("algun-ingreso-no").checked=true;
	$("#algun-ingreso-si").change(function(){
		$("#respuesta-tipo").load("/jovenes/public/js/apartado_a/Contenido/contenido_algun_ingreso.php");
		$("#respuesta-monto").load("/jovenes/public/js/apartado_a/Contenido/contenido_algun_ingreso_monto.php");
	});	
	$("#algun-ingreso-no").change(function(){
		$("#respuesta-tipo").html("");
		$("#respuesta-monto").html("");
	});

	document.getElementById("alquiler-terreno-no").checked=true;
	$("#alquiler-terreno-si").change(function(){
		$("#respuesta-terreno").load("/jovenes/public/js/apartado_a/Contenido/contenido_alquiler_terreno.php");
	});	
	$("#alquiler-terreno-no").change(function(){
		$("#respuesta-terreno").html("");///abre
	});

	document.getElementById("pension-no").checked=true;
	$("#pension-si").change(function(){
		$("#respuesta-pension").load("/jovenes/public/js/apartado_a/Contenido/contenido_pension.php");
	});	
	$("#pension-no").change(function(){
		$("#respuesta-pension").html("");///abre
	});

	document.getElementById("apoyo-no").checked=true;
	$("#apoyo-si").change(function(){
		$("#respuesta-cual").load("/jovenes/public/js/apartado_a/Contenido/contenido_cual_apoyo.php");
		$("#respuesta-cuantos").load("/jovenes/public/js/apartado_a/Contenido/contenido_cuantos_apoyos.php");
	});	
	$("#apoyo-no").change(function(){
		$("#respuesta-cual").html("");
		$("#respuesta-cuantos").html("");
	});

	document.getElementById("estudia-no").checked=true;
	$("#estudia-si").change(function(){
		$("#beca").load("/jovenes/public/js/apartado_a/Contenido/contenido_beca.php");
		$("#periodicidad").load("/jovenes/public/js/apartado_a/Contenido/contenido_periodicidad_beca.php");
		$("#monto-beca").load("/jovenes/public/js/apartado_a/Contenido/contenido_beca_monto.php");
		$("#traslado").load("/jovenes/public/js/apartado_a/Contenido/contenido_traslado.php");
	});	
	$("#estudia-no").change(function(){
		$("#beca").html("");///abre
		$("#periodicidad").html("");///abre
		$("#monto-beca").html("");///abre
		$("#traslado").html("");///abre
	});

	document.getElementById("ingreso-no").checked=true;
	$("#ingreso-si").change(function(){
		$("#ingreso").load("/jovenes/public/js/apartado_a/Contenido/contenido_ingreso.php");
	});	
	$("#ingreso-no").change(function(){
		$("#ingreso").html("");///abre
	});

	document.getElementById("afectada-no").checked=true;
	$("#afectada-si").change(function(){
		$("#respuesta-fenomeno").load("/jovenes/public/js/apartado_a/Contenido/contenido_fenomeno.php");
	});	
	$("#afectada-no").change(function(){
		$("#respuesta-fenomeno").html("");///abre
	});
});