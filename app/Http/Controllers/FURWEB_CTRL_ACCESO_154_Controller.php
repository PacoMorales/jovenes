<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FURWEB_CTRL_ACCESO_154;
use App\APARTA_FOLIO_154;
use App\FURWEB_PONDERACION_154;
use App\FURWEB_EDOS_CTA_154;
use App\FURWEB_DIARIO_154;
use App\FURWEB_FINANZAS_154; 
use Laracasts\Flash\Flash;

class FURWEB_CTRL_ACCESO_154_Controller extends Controller{
	public function altaBeneficiario(){
    	return view('jovenes-movimiento.login');
    }

   	public function capturaBeneficiario(Request $request){
	   	if(FURWEB_CTRL_ACCESO_154::validaNombre($request->APELLIDO_PATERNO,date('d/m/Y'))==false){
			return back()->withInput()->withErrors(['FOLIO' => 'El APELLIDO PATERNO '.$request->APELLIDO_PATERNO.' no corresponde al dia '.date('d/m/Y').' de registro.']);	   		
	   	}
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
	          $ip = $_SERVER['REMOTE_ADDR'];}
/* REGISTRA EN APARTA_FOLIO_154 ******************************************************************************************************/
			$folio = APARTA_FOLIO_154::select('FOLIO')->where('FOLIO','>',0)->max('FOLIO');
			$nuevo_aparta_folio = new APARTA_FOLIO_154();
				$nuevo_aparta_folio->FOLIO = $folio+1;
				$nuevo_aparta_folio->CVE_PROGRAMA = 154;
				$nuevo_aparta_folio->FECHA_REG = date('Y/m/d');
				$nuevo_aparta_folio->save();
/* REGISTRA EN FURWEB_PONDERACION_154 ******************************************************************************************************/
			$nuevo_ponderacion = new FURWEB_PONDERACION_154();
				$nuevo_ponderacion->N_PERIODO = date('Y');
				$nuevo_ponderacion->CVE_PROGRAMA = 154;
				$nuevo_ponderacion->FOLIO = $folio+1;
				$nuevo_ponderacion->FOLIO_RELACIONADO = (string)$folio+1;
				$nuevo_ponderacion->FECHA_REG = date('Y/m/d');
				$nuevo_ponderacion->USU = $request->LOGIN;
				$nuevo_ponderacion->PW = $request->PASSWORD;
				$nuevo_ponderacion->IP = $ip;
				$nuevo_ponderacion->save();
/* REGISTRA EN FURWEB_EDOS_CTA_154 ******************************************************************************************************/
			$nuevo_edo_cta = new FURWEB_EDOS_CTA_154();
				$nuevo_edo_cta->N_PERIODO = date('Y');
				$nuevo_edo_cta->CVE_PROGRAMA = 154;
				$nuevo_edo_cta->FOLIO = $folio+1;
				$nuevo_edo_cta->FOLIO_RELACIONADO = (string)$folio+1;
				$nuevo_edo_cta->FECHA_REG = date('Y/m/d');
				$nuevo_edo_cta->USU = $request->LOGIN;
				$nuevo_edo_cta->PW = $request->PASSWORD;
				$nuevo_edo_cta->IP = $ip;
				$nuevo_edo_cta->save();
/* REGISTRA EN FURWEB_DIARIO_154 ******************************************************************************************************/
			$nuevo_diario = new FURWEB_DIARIO_154();
				$nuevo_diario->N_PERIODO = date('Y');
				$nuevo_diario->CVE_PROGRAMA = 154;
				$nuevo_diario->MES = date('m');
				$nuevo_diario->FOLIO = $folio+1;
				$nuevo_diario->FOLIO_RELACIONADO = (string)$folio+1;
				$nuevo_diario->FECHA_REG = date('Y/m/d');
				$nuevo_diario->USU = $request->LOGIN;
				$nuevo_diario->IP = $ip;
				$nuevo_diario->save();
/* REGISTRA EN FURWEB_FINANZAS_154 ******************************************************************************************************/
			$nuevo_finanzas = new FURWEB_FINANZAS_154();
				$nuevo_finanzas->N_PERIODO = date('Y');
				$nuevo_finanzas->CVE_PROGRAMA = 154;
				$nuevo_finanzas->FOLIO = $folio+1;
				$nuevo_finanzas->FOLIO_RELACIONADO = (string)$folio+1;
				$nuevo_finanzas->TARJETA = (string)$folio+1;
				$nuevo_finanzas->ID_TARJETA = (string)$folio+1;
				$nuevo_finanzas->FECHA_REG = date('Y/m/d');
				$nuevo_finanzas->USU = $request->LOGIN;
				$nuevo_finanzas->PW = $request->PASSWORD;
				$nuevo_finanzas->IP = $ip;
				$nuevo_finanzas->save();
/* REGISTRA EN FURWEB_CTRL_ACEESO_154 ******************************************************************************************************/
	    	$nuevo 					 = new FURWEB_CTRL_ACCESO_154();
	    	$nuevo->N_PERIODO 		 = date('Y');
	    	$nuevo->CVE_PROGRAMA 	 = 154;
	    	$nuevo->FOLIO 			 = $folio + 1;
	    	$nuevo->FOLIO_RELACIONADO= (string)$folio + 1;
	    	$nuevo->AP_PATERNO       = strtoupper($request->APELLIDO_PATERNO);
	    	$nuevo->AP_MATERNO       = strtoupper($request->APELLIDO_MATERNO);
	    	$nuevo->NOMBRES 		 = strtoupper($request->NOMBRES);
	    	$nuevo->NOMBRE_COMPLETO  = strtoupper($request->APELLIDO_PATERNO.' '.$request->APELLIDO_MATERNO.' '.$request->NOMBRES);
	    	$nuevo->LOGIN            = $request->LOGIN;
	        $nuevo->PASSWORD         = $request->PASSWORD;
	        $nuevo->TIPO_USUARIO     = 'PG';
	        $nuevo->STATUS_1         = '1';
	        $nuevo->STATUS_2         = '1';
	        $nuevo->FECHA_REGISTRO   = date('Y/m/d');
	        $nuevo->IP 				 = $ip;
	        if($nuevo->save() == true){
	        	return redirect()->route('beneficiario.archivo',$nuevo->LOGIN);
	        }else{
	        	return back()->withInput()->withErrors(['FOLIO' => 'Ha ocurrido un error inesperado.']);
	        }
	    }
	}
}
