<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SEDESEM_299_Request;

use Laracasts\Flash\Flash;

use App\FURWEB_CTRL_ACCESO;
use App\FURWEB_METADATO_299;
use App\SEDESEM_299;
use App\CAT_PROGRAMAS;
use App\CAT_PARENTESCO;
use App\CAT_LENGUAS;
use App\CAT_CANTIDADES;
use App\CAT_TIEMPO_RADICAR;
use App\CAT_ENFERMEDADES;
use App\CAT_DISCAPACIDAD;
use App\CAT_INST_SALUD;
use App\CAT_ORFANDAD;
use App\CAT_GRADO_ESTUDIO;
use App\CAT_TIPO_EMPLEO;
use App\CAT_SALARIOS;
use App\CAT_DEPENDIENTES_ECONOM;
use App\CAT_PER_INGRESOS;
use App\CAT_CASADONDEVIVE_ES;
use App\CAT_MATERIAL_VIVIENDA;
use App\CAT_SERVICIO_AGUA;
use App\CAT_SERVICIO_SANDREN;
use App\CAT_SERVICIO_LUZ;
use App\CAT_COMBUSTIBLES;
use App\CAT_ORIGEN;

class SEDESEM_299_Controller extends Controller
{
    public function index(){}

    public function create(){}

    public function store(SEDESEM_299_Request $request){
        //dd($request->all());
        if(is_numeric($request->FOLIO)){
            $log = FURWEB_CTRL_ACCESO::find($request->FOLIO);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }
        $nuevo_registro                             = new SEDESEM_299();
        $nuevo_registro->N_PERIODO                  = date('Y');
        $nuevo_registro->CVE_PROGRAMA               = 299;
        $nuevo_registro->FOLIO                      = $request->FOLIO;
        $nuevo_registro->FOLIO_RELACIONADO          = $request->FOLIO;
        $nuevo_registro->ES_JEFA                    = $request->ES_JEFA;
        $nuevo_registro->CVE_PARENTESCO             = $request->CVE_PARENTESCO;
        $nuevo_registro->INDIGENA                   = $request->INDIGENA;
        $nuevo_registro->HABLA_LENGUA_I             = $request->HABLA_LENGUA_I;
        $nuevo_registro->CVE_LENGUA                 = $request->CVE_LENGUA;
        $nuevo_registro->CVE_CANT                   = $request->CVE_CANT;
        $nuevo_registro->REPATRIADO                 = $request->REPATRIADO;
        $nuevo_registro->CVE_TIEMPO_RADICAR         = $request->CVE_TIEMPO_RADICAR;
        $nuevo_registro->ES_VICTIMA                 = $request->ES_VICTIMA;
        $nuevo_registro->DELITO_CUAL                = strtoupper($request->DELITO_CUAL);
        $nuevo_registro->CVE_ENFERMEDAD             = $request->CVE_ENFERMEDAD;
        $nuevo_registro->EMBARAZADA                 = $request->EMBARAZADA;
        $nuevo_registro->EMBARAZADA_MESES           = $request->EMBARAZADA_MESES;
        $nuevo_registro->CVE_DISCAPACIDAD           = $request->CVE_DISCAPACIDAD;
        $nuevo_registro->CVE_INST_SALUD             = $request->CVE_INST_SALUD;
        $nuevo_registro->CVE_ORFANDAD               = $request->CVE_ORFANDAD;
        $nuevo_registro->CVE_GRADO_ESTUDIOS         = $request->CVE_GRADO_ESTUDIOS;
        $nuevo_registro->DESC_CCT                   = $request->DESC_CCT;
        $nuevo_registro->TIPO_ZONA                  = $request->TIPO_ZONA;
        $nuevo_registro->TRABAJA                    = $request->TRABAJA;
        $nuevo_registro->CVE_TIPO_EMPLEO            = $request->CVE_TIPO_EMPLEO;
        $nuevo_registro->CVE_ACTIVIDAD_LABORAL      = $request->CVE_ACTIVIDAD_LABORAL;
        $nuevo_registro->CVE_SALARIO                = $request->CVE_SALARIO;
        $nuevo_registro->ALGUN_INGRESO              = $request->ALGUN_INGRESO;
        $nuevo_registro->ALGUN_INGRESO_TIPO         = $request->ALGUN_INGRESO_TIPO;
        $nuevo_registro->ALGUN_INGRESO_MONTO        = $request->ALGUN_INGRESO_MONTO;
        $nuevo_registro->ALQUILER_TERRENO           = $request->ALQUILER_TERRENO;
        $nuevo_registro->ALQUILER_TERRENO_MONTO     = $request->ALQUILER_TERRENO_MONTO;
        $nuevo_registro->PENSION                    = $request->PENSION;
        $nuevo_registro->PENSION_MONTO              = $request->PENSION_MONTO;
        $nuevo_registro->CVE_SALARIO2               = $request->CVE_SALARIO2;
        $nuevo_registro->CVE_DEPEN_ECONOM           = $request->CVE_DEPEN_ECONOM;
        $nuevo_registro->CVE_PARENTESCO2            = $request->CVE_PARENTESCO2;
        $nuevo_registro->RECIBE_APOYO               = $request->RECIBE_APOYO;
        $nuevo_registro->CUANTOS_APOYOS             = strtoupper($request->CUANTOS_APOYOS);
        $nuevo_registro->CUAL_APOYO                 = strtoupper($request->CUAL_APOYO);
        $nuevo_registro->CVE_CANT2                  = $request->CVE_CANT2;

        $nuevo_registro->TIPO_ZONA2                 = NULL;
        $nuevo_registro->CVE_ACTIVIDAD              = 0;
        $nuevo_registro->CVE_REALIZA_ACTIVIDAD      = 0;
        $nuevo_registro->ACTIVIDAD_FUE              = NULL;
        $nuevo_registro->CVE_SALARIO3               = 0;

        $nuevo_registro->TIPO_ZONA3                 = $request->TIPO_ZONA3; //QUIEN ES ESTA ZONA???
        $nuevo_registro->TRABAJA2                   = $request->TRABAJA2;
        $nuevo_registro->CVE_SALARIO4               = $request->CVE_SALARIO4;
        $nuevo_registro->ESTUDIA                    = $request->ESTUDIA;
        $nuevo_registro->RECIBE_INGRESO             = $request->RECIBE_INGRESO;
        $nuevo_registro->CVE_SALARIO5               = $request->CVE_SALARIO5;
        $nuevo_registro->BECA                       = $request->BECA;
        $nuevo_registro->CVE_PER_INGRESO            = $request->CVE_PER_INGRESO;
        $nuevo_registro->MONTO_BECA                 = $request->MONTO_BECA;
        $nuevo_registro->MONTO_TRANSPORTE           = $request->MONTO_TRANSPORTE;
        $nuevo_registro->CVE_TIEMPO                 = $request->CVE_TIEMPO;
        $nuevo_registro->CVE_CANT3                  = $request->CVE_CANT3;
        $nuevo_registro->ADULTO_SINCOMIDA           = $request->ADULTO_SINCOMIDA;
        $nuevo_registro->ADULTO_SINTIOHAMBRE        = $request->ADULTO_SINTIOHAMBRE;
        $nuevo_registro->MENOR_PVA                  = $request->MENOR_PVA;
        $nuevo_registro->ADULTO_COMIO               = $request->ADULTO_COMIO;
        $nuevo_registro->ADULTO_PVA                 = $request->ADULTO_PVA;
        $nuevo_registro->LIMOSNA                    = $request->LIMOSNA;
        $nuevo_registro->ADULTO_SINCENAR            = $request->ADULTO_SINCENAR;
        $nuevo_registro->MENOR_COMIO                = $request->MENOR_COMIO;
        $nuevo_registro->ADULTO_COMIOMENOS          = $request->ADULTO_COMIOMENOS;
        $nuevo_registro->MENOR_COMIOMENOS           = $request->MENOR_COMIOMENOS;
        $nuevo_registro->MENOR_SINTIOHAMBRE         = $request->MENOR_SINTIOHAMBRE;
        $nuevo_registro->MENOR_MENOSCOMIDA          = $request->MENOR_MENOSCOMIDA;
        $nuevo_registro->MENOR_ACOSTARHAMBRE        = $request->MENOR_ACOSTARHAMBRE;
        $nuevo_registro->CVE_CASADONDEVIVE_ES       = $request->CVE_CASADONDEVIVE_ES;
        $nuevo_registro->CVE_MATERIAL               = $request->CVE_MATERIAL;
        $nuevo_registro->CVE_MATERIAL2              = $request->CVE_MATERIAL2;
        $nuevo_registro->CVE_MATERIAL3              = $request->CVE_MATERIAL3;
        $nuevo_registro->CUARTOS                    = $request->CUARTOS;
        $nuevo_registro->CUARTOS_DORMIR             = $request->CUARTOS_DORMIR;
        $nuevo_registro->CVE_SERVICIO_AGUA          = $request->CVE_SERVICIO_AGUA;
        $nuevo_registro->EXCUSADO                   = $request->EXCUSADO;
        $nuevo_registro->SANITARIO                  = $request->SANITARIO;
        $nuevo_registro->CVE_SERVICIO_SANDREN       = $request->CVE_SERVICIO_SANDREN;
        $nuevo_registro->CVE_SERVICIO_SANDREN2      = $request->CVE_SERVICIO_SANDREN2;
        $nuevo_registro->CVE_SERVICIO_SANDREN3      = $request->CVE_SERVICIO_SANDREN3;
        $nuevo_registro->CVE_SERVICIO_LUZ           = $request->CVE_SERVICIO_LUZ;
        $nuevo_registro->CVE_COMBUSTIBLE            = $request->CVE_COMBUSTIBLE;
        $nuevo_registro->FOGON                      = $request->FOGON;
        $nuevo_registro->LAVADERO                   = $request->LAVADERO;
        $nuevo_registro->TARJA                      = $request->TARJA;
        $nuevo_registro->REGADERA                   = $request->REGADERA;
        $nuevo_registro->TINACO                     = $request->TINACO;
        $nuevo_registro->CISTERNA                   = $request->CISTERNA;
        $nuevo_registro->PILETA                     = $request->PILETA;
        $nuevo_registro->CALENTADOR_SOLAR           = $request->CALENTADOR_SOLAR;
        $nuevo_registro->CALENTADOR_GAS             = $request->CALENTADOR_GAS;
        $nuevo_registro->TANQUE_GAS                 = $request->TANQUE_GAS;
        $nuevo_registro->MEDIDOR_LUZ                = $request->MEDIDOR_LUZ;
        $nuevo_registro->AIRE_ACOND                 = $request->AIRE_ACOND;
        $nuevo_registro->CALEFACCION                = $request->CALEFACCION;
        $nuevo_registro->CVE_CANT4                  = $request->CVE_CANT4;
        $nuevo_registro->CVE_CASADONDEVIVE_ES2      = $request->CVE_CASADONDEVIVE_ES2;
        $nuevo_registro->AFECTADA                   = $request->AFECTADA;
        $nuevo_registro->FENOMENO                   = strtoupper($request->FENOMENO);
        $nuevo_registro->CVE_ARBOL                  = 0;
        $nuevo_registro->FECHA_REG                  = date('d/m/Y');
        $nuevo_registro->USU                        = $request->LOGIN;
        $nuevo_registro->PW                         = $request->PW;
        $nuevo_registro->IP                         = $request->IP;
        $nuevo_registro->FECHA_M                    = date('d/m/Y');
        $nuevo_registro->USU_M                      = $request->LOGIN;
        $nuevo_registro->PW_M                       = $request->PW_M;
        $nuevo_registro->IP_M                       = $request->IP_M;
        $nuevo_registro->CVE_ORIGEN                 = $request->CVE_ORIGEN;
        //dd($nuevo_registro);
        $nuevo_registro->save();
        Flash::success("La información fue registrada satisfactoriamente.")->important();
        Flash::info("Toda la información obtenida es confidencial.")->important();
        return redirect()->route('usuario.show',$nuevo_registro->FOLIO);
    }

    public function show($id){
        if(is_numeric($id)){
            $log = FURWEB_CTRL_ACCESO::find($id);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }
    	$usuario 		= FURWEB_CTRL_ACCESO::find($id);
    	$datos 			= FURWEB_METADATO_299::find($id);
    	$programa 		= CAT_PROGRAMAS::find(299);
    	$parentesco 	= CAT_PARENTESCO::orderBy('CVE_PARENTESCO','asc')->get();
    	$lenguas 		= CAT_LENGUAS::all();
    	$cantidades 	= CAT_CANTIDADES::all();
    	$tiempos		= CAT_TIEMPO_RADICAR::all();
    	$enfermedades 	= CAT_ENFERMEDADES::all();
    	$discapacidades = CAT_DISCAPACIDAD::all();
    	$instsalud		= CAT_INST_SALUD::all();
    	$orfandad 		= CAT_ORFANDAD::orderBy('CVE_ORFANDAD','asc')->get();
    	$grado_estudios = CAT_GRADO_ESTUDIO::orderBy('CVE_GRADO_ESTUDIOS','asc')->get();
    	$t_empleo 		= CAT_TIPO_EMPLEO::all();
    	$salarios 		= CAT_SALARIOS::all();
    	$dependientes 	= CAT_DEPENDIENTES_ECONOM::all();
        $ingresos       = CAT_PER_INGRESOS::orderBy('CVE_PER_INGRESO','asc')->get();
        $casas          = CAT_CASADONDEVIVE_ES::orderBy('CVE_CASADONDEVIVE_ES','asc')->get();
        $materiales     = CAT_MATERIAL_VIVIENDA::orderBy('CVE_MATERIAL','asc')->get();
        $servicios_a    = CAT_SERVICIO_AGUA::all();
        $sandren        = CAT_SERVICIO_SANDREN::all();
        $servicio_l     = CAT_SERVICIO_LUZ::all();
        $combustibles   = CAT_COMBUSTIBLES::all();
        $origenes       = CAT_ORIGEN::all();
		return view('apartado-b.inicio',compact('usuario','programa','datos','parentesco','lenguas','cantidades','tiempos','enfermedades','discapacidades','instsalud','orfandad','grado_estudios','t_empleo','salarios','dependientes','ingresos','casas','materiales','servicios_a','sandren','servicio_l','combustibles','origenes'));
    }

    public function edit($id){
        if(is_numeric($id)){
            $log = FURWEB_CTRL_ACCESO::find($id);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }
        $usuario        = FURWEB_CTRL_ACCESO::find($id);
        $datos          = FURWEB_METADATO_299::find($id);
        $sedem          = SEDESEM_299::find($id);
        $programa       = CAT_PROGRAMAS::find(299);
        $parentesco     = CAT_PARENTESCO::orderBy('CVE_PARENTESCO','asc')->get();
        $lenguas        = CAT_LENGUAS::all();
        $cantidades     = CAT_CANTIDADES::all();
        $tiempos        = CAT_TIEMPO_RADICAR::all();
        $enfermedades   = CAT_ENFERMEDADES::all();
        $discapacidades = CAT_DISCAPACIDAD::all();
        $instsalud      = CAT_INST_SALUD::all();
        $orfandad       = CAT_ORFANDAD::orderBy('CVE_ORFANDAD','asc')->get();
        $grado_estudios = CAT_GRADO_ESTUDIO::orderBy('CVE_GRADO_ESTUDIOS','asc')->get();
        $t_empleo       = CAT_TIPO_EMPLEO::all();
        $salarios       = CAT_SALARIOS::all();
        $dependientes   = CAT_DEPENDIENTES_ECONOM::all();
        $ingresos       = CAT_PER_INGRESOS::orderBy('CVE_PER_INGRESO','asc')->get();
        $casas          = CAT_CASADONDEVIVE_ES::orderBy('CVE_CASADONDEVIVE_ES','asc')->get();
        $materiales     = CAT_MATERIAL_VIVIENDA::orderBy('CVE_MATERIAL','asc')->get();
        $servicios_a    = CAT_SERVICIO_AGUA::all();
        $sandren        = CAT_SERVICIO_SANDREN::all();
        $servicio_l     = CAT_SERVICIO_LUZ::all();
        $combustibles   = CAT_COMBUSTIBLES::all();
        $origenes       = CAT_ORIGEN::all();
        return view('apartado-b.editar',compact('usuario','programa','datos','parentesco','lenguas','cantidades','tiempos','enfermedades','discapacidades','instsalud','orfandad','grado_estudios','t_empleo','salarios','dependientes','ingresos','casas','materiales','servicios_a','sandren','servicio_l','combustibles','origenes','sedem'));
    }

    public function update(SEDESEM_299_Request $request, $id){
        if(is_numeric($id)){
            $log = FURWEB_CTRL_ACCESO::find($request->FOLIO);
            if(!$log->count())
                return view('errors.error');
            else
                if($log->status_2==' '){
                    return view('errors.error');
                }
            }else{
                return view('errors.error');
            }

        $nuevo_registro = [
        //'N_PERIODO'                  => date('Y');
        //'CVE_PROGRAMA'               => 299;
        //'FOLIO'                      => $request->FOLIO,
        'FOLIO_RELACIONADO'          => $request->FOLIO,
        'ES_JEFA'                    => $request->ES_JEFA,
        'CVE_PARENTESCO'             => $request->CVE_PARENTESCO,
        'INDIGENA'                   => $request->INDIGENA,
        'HABLA_LENGUA_I'             => $request->HABLA_LENGUA_I,
        'CVE_LENGUA'                 => $request->CVE_LENGUA,
        'CVE_CANT'                   => $request->CVE_CANT,
        'REPATRIADO'                 => $request->REPATRIADO,
        'CVE_TIEMPO_RADICAR'         => $request->CVE_TIEMPO_RADICAR,
        'ES_VICTIMA'                 => $request->ES_VICTIMA,
        'DELITO_CUAL'                => strtoupper($request->DELITO_CUAL),
        'CVE_ENFERMEDAD'             => $request->CVE_ENFERMEDAD,
        'EMBARAZADA'                 => $request->EMBARAZADA,
        'EMBARAZADA_MESES'           => $request->EMBARAZADA_MESES,
        'CVE_DISCAPACIDAD'           => $request->CVE_DISCAPACIDAD,
        'CVE_INST_SALUD'             => $request->CVE_INST_SALUD,
        'CVE_ORFANDAD'               => $request->CVE_ORFANDAD,
        'CVE_GRADO_ESTUDIOS'         => $request->CVE_GRADO_ESTUDIOS,
        'DESC_CCT'                   => $request->DESC_CCT,
        'TIPO_ZONA'                  => $request->TIPO_ZONA,
        'TRABAJA'                    => $request->TRABAJA,
        'CVE_TIPO_EMPLEO'            => $request->CVE_TIPO_EMPLEO,
        'CVE_ACTIVIDAD_LABORAL'      => $request->CVE_ACTIVIDAD_LABORAL,
        'CVE_SALARIO'                => $request->CVE_SALARIO,
        'ALGUN_INGRESO'              => $request->ALGUN_INGRESO,
        'ALGUN_INGRESO_TIPO'         => $request->ALGUN_INGRESO_TIPO,
        'ALGUN_INGRESO_MONTO'        => $request->ALGUN_INGRESO_MONTO,
        'ALQUILER_TERRENO'           => $request->ALQUILER_TERRENO,
        'ALQUILER_TERRENO_MONTO'     => $request->ALQUILER_TERRENO_MONTO,
        'PENSION'                    => $request->PENSION,
        'PENSION_MONTO'              => $request->PENSION_MONTO,
        'CVE_SALARIO2'               => $request->CVE_SALARIO2,
        'CVE_DEPEN_ECONOM'           => $request->CVE_DEPEN_ECONOM,
        'CVE_PARENTESCO2'            => $request->CVE_PARENTESCO2,
        'RECIBE_APOYO'               => $request->RECIBE_APOYO,
        'CUANTOS_APOYOS'             => strtoupper($request->CUANTOS_APOYOS),
        'CUAL_APOYO'                 => strtoupper($request->CUAL_APOYO),
        'CVE_CANT2'                  => $request->CVE_CANT2,

        'TIPO_ZONA2'                 => NULL,
        'CVE_ACTIVIDAD'              => 0,
        'CVE_REALIZA_ACTIVIDAD'      => 0,
        'ACTIVIDAD_FUE'              => NULL,
        'CVE_SALARIO3'               => 0,

        'TIPO_ZONA3'                 => $request->TIPO_ZONA3, //QUIEN ES ESTA ZONA???
        'TRABAJA2'                   => $request->TRABAJA2,
        'CVE_SALARIO4'               => $request->CVE_SALARIO4,
        'ESTUDIA'                    => $request->ESTUDIA,
        'RECIBE_INGRESO'             => $request->RECIBE_INGRESO,
        'CVE_SALARIO5'               => $request->CVE_SALARIO5,
        'BECA'                       => $request->BECA,
        'CVE_PER_INGRESO'            => $request->CVE_PER_INGRESO,
        'MONTO_BECA'                 => $request->MONTO_BECA,
        'MONTO_TRANSPORTE'           => $request->MONTO_TRANSPORTE,
        'CVE_TIEMPO'                 => $request->CVE_TIEMPO,
        'CVE_CANT3'                  => $request->CVE_CANT3,
        'ADULTO_SINCOMIDA'           => $request->ADULTO_SINCOMIDA,
        'ADULTO_SINTIOHAMBRE'        => $request->ADULTO_SINTIOHAMBRE,
        'MENOR_PVA'                  => $request->MENOR_PVA,
        'ADULTO_COMIO'               => $request->ADULTO_COMIO,
        'ADULTO_PVA'                 => $request->ADULTO_PVA,
        'LIMOSNA'                    => $request->LIMOSNA,
        'ADULTO_SINCENAR'            => $request->ADULTO_SINCENAR,
        'MENOR_COMIO'                => $request->MENOR_COMIO,
        'ADULTO_COMIOMENOS'          => $request->ADULTO_COMIOMENOS,
        'MENOR_COMIOMENOS'           => $request->MENOR_COMIOMENOS,
        'MENOR_SINTIOHAMBRE'         => $request->MENOR_SINTIOHAMBRE,
        'MENOR_MENOSCOMIDA'          => $request->MENOR_MENOSCOMIDA,
        'MENOR_ACOSTARHAMBRE'        => $request->MENOR_ACOSTARHAMBRE,
        'CVE_CASADONDEVIVE_ES'       => $request->CVE_CASADONDEVIVE_ES,
        'CVE_MATERIAL'               => $request->CVE_MATERIAL,
        'CVE_MATERIAL2'              => $request->CVE_MATERIAL2,
        'CVE_MATERIAL3'              => $request->CVE_MATERIAL3,
        'CUARTOS'                    => $request->CUARTOS,
        'CUARTOS_DORMIR'             => $request->CUARTOS_DORMIR,
        'CVE_SERVICIO_AGUA'          => $request->CVE_SERVICIO_AGUA,
        'EXCUSADO'                   => $request->EXCUSADO,
        'SANITARIO'                  => $request->SANITARIO,
        'CVE_SERVICIO_SANDREN'       => $request->CVE_SERVICIO_SANDREN,
        'CVE_SERVICIO_SANDREN2'      => $request->CVE_SERVICIO_SANDREN2,
        'CVE_SERVICIO_SANDREN3'      => $request->CVE_SERVICIO_SANDREN3,
        'CVE_SERVICIO_LUZ'           => $request->CVE_SERVICIO_LUZ,
        'CVE_COMBUSTIBLE'            => $request->CVE_COMBUSTIBLE,
        'FOGON'                      => $request->FOGON,
        'LAVADERO'                   => $request->LAVADERO,
        'TARJA'                      => $request->TARJA,
        'REGADERA'                   => $request->REGADERA,
        'TINACO'                     => $request->TINACO,
        'CISTERNA'                   => $request->CISTERNA,
        'PILETA'                     => $request->PILETA,
        'CALENTADOR_SOLAR'           => $request->CALENTADOR_SOLAR,
        'CALENTADOR_GAS'             => $request->CALENTADOR_GAS,
        'TANQUE_GAS'                 => $request->TANQUE_GAS,
        'MEDIDOR_LUZ'                => $request->MEDIDOR_LUZ,
        'AIRE_ACOND'                 => $request->AIRE_ACOND,
        'CALEFACCION'                => $request->CALEFACCION,
        'CVE_CANT4'                  => $request->CVE_CANT4,
        'CVE_CASADONDEVIVE_ES2'      => $request->CVE_CASADONDEVIVE_ES2,
        'AFECTADA'                   => $request->AFECTADA,
        'FENOMENO'                   => strtoupper($request->FENOMENO),
        'CVE_ARBOL'                  => 0,
        'FECHA_REG'                  => date('d/m/Y'),
        'USU'                        => $request->LOGIN,
        'PW'                         => $request->PW,
        'IP'                         => $request->IP,
        'FECHA_M'                    => date('d/m/Y'),
        'USU_M'                      => $request->LOGIN,
        'PW_M'                       => $request->PW_M,
        'IP_M'                       => $request->IP_M,
        'CVE_ORIGEN'                 => $request->CVE_ORIGEN
        ];
        $nuevo = SEDESEM_299::where('FOLIO',$request->FOLIO)->update($nuevo_registro);
        Flash::success("La información fue actualizada satisfactoriamente.")->important();
        Flash::info("Toda la información obtenida es confidencial.")->important();
        return redirect()->route('usuario.show',$id);
    }

    public function destroy($id){}
}
