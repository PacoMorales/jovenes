<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FURWEB_CTRL_ACCESO_154;
use Laracasts\Flash\Flash;

class FURWEB_CTRL_ACCESO_154_Controller extends Controller{
	public function altaBeneficiario(){
    	return view('jovenes-movimiento.login');
    }

   	public function capturaBeneficiario(Request $request){
	   	//dd($request->all());
	    $existe = FURWEB_CTRL_ACCESO_154::select('LOGIN')
	    								  ->where('LOGIN','like','%'.$request->LOGIN.'%')
	    								  ->get();
	    if($existe->count() >= 1){
			return back()->withInput()->withErrors(['FOLIO' => 'El LOGIN '.$request->LOGIN.' ya ha sido registrado, favor de verificarlo.']);    	
	    }else{
	    	if (getenv('HTTP_CLIENT_IP')) {
	          $ip = getenv('HTTP_CLIENT_IP');
	        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
	          $ip = getenv('HTTP_X_FORWARDED_FOR');
	        } elseif (getenv('HTTP_X_FORWARDED')) {
	          $ip = getenv('HTTP_X_FORWARDED');
	        } elseif (getenv('HTTP_FORWARDED_FOR')) {
	          $ip = getenv('HTTP_FORWARDED_FOR');
	        } elseif (getenv('HTTP_FORWARDED')) {
	          $ip = getenv('HTTP_FORWARDED');
	        } else {
	          // Método por defecto de obtener la IP del usuario
	          // Si se utiliza un proxy, esto nos daría la IP del proxy
	          // y no la IP real del usuario.
	          $ip = $_SERVER['REMOTE_ADDR'];}
	        $folio = FURWEB_CTRL_ACCESO_154::select('FOLIO')->where('FOLIO','>','0')->max('FOLIO');
	    	$nuevo 					 = new FURWEB_CTRL_ACCESO_154();
	    	$nuevo->N_PERIODO 		 = date('Y');
	    	$nuevo->CVE_PROGRAMA 	 = 154;
	    	$nuevo->FOLIO 			 = $folio + 1;
	    	$nuevo->FOLIO_RELACIONADO= $folio + 1;
	    	$nuevo->LOGIN            = $request->LOGIN;
	        $nuevo->PASSWORD         = $request->PASSWORD;
	        $nuevo->TIPO_USUARIO     = 'PG';
	        $nuevo->STATUS_1         = '1';
	        $nuevo->STATUS_2         = '1';
	        $nuevo->FECHA_REGISTRO   = date('d/m/Y');
	        $nuevo->IP 				 = $ip;
	        if($nuevo->save() == true){
	        	return redirect()->route('beneficiario.cuenta',$nuevo->LOGIN);
	        }else{
	        	return back()->withInput()->withErrors(['FOLIO' => 'Ha ocurrido un error inesperado.']);
	        }
	    }
	}
}
