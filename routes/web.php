<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('jovenes-movimiento.login');
});
	Route::group(['prefix' => 'jovenes-en-movimiento'], function(){
		Route::get('info-personal/{id}/localidades','JOVENES_MOVIMIENTO_Controller@LocalidadMunicipio')->name('info-personal.localidades');
		Route::get('info-personal/{id}/secciones','JOVENES_MOVIMIENTO_Controller@SeccionLocalidad')->name('info-personal.secciones');
		Route::get('localidades/{id}','JOVENES_MOVIMIENTO_Controller@LocalidadMunicipio');
		Route::get('secciones/{id}','JOVENES_MOVIMIENTO_Controller@SeccionLocalidad');

		Route::get('nuevo/crea-tu-cuenta/login','FURWEB_CTRL_ACCESO_154_Controller@altaBeneficiario')->name('beneficiario.login');
		Route::post('nuevo/datos','FURWEB_CTRL_ACCESO_154_Controller@capturaBeneficiario')->name('beneficiario.captura');

		Route::get('nuevo/carga-tus.archivos/pdf/{id}','JOVENES_MOVIMIENTO_Controller@archivos')->name('beneficiario.archivo');
		Route::post('nuevo/carga-tus-archivos/pdf','JOVENES_MOVIMIENTO_Controller@cargaArchivos')->name('beneficiario.archivoCaptura');

		Route::get('nueva/cuenta/{id}','JOVENES_MOVIMIENTO_Controller@altaInfoPersonal')->name('beneficiario.cuenta');
		Route::post('nueva/cuenta/datos-personales','JOVENES_MOVIMIENTO_Controller@capturaInfoPersonal')->name('beneficiario.capturaInfoPer');

		Route::get('nuevo/crea-tu-cuenta/datos-socioeconomicos/{id}','JOVENES_MOVIMIENTO_Controller@altaInfoSocio')->name('beneficiario.apartado-b');
		Route::post('nueva/cuenta/datos-socioeconomicos','JOVENES_MOVIMIENTO_Controller@capturaInfoSocio')->name('beneficiario.capturaInfoSoc');

		Route::get('registro-completo/informacion-adicional/{id}','JOVENES_MOVIMIENTO_Controller@info')->name('beneficiario.info');
	});