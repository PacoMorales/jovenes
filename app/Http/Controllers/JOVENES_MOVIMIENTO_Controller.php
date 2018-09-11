<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FURWEB_CTRL_ACCESO_154;
use App\SEDESEM_154;
use App\FURWEB_METADATO_154;
use App\FURWEB_CONTROL_DOCTOS_154;
use PDF;
use App\CAT_PROGRAMAS;
use App\CAT_ACTIVIDAD_LABORAL;
use App\CAT_RED_SOCIAL;
use App\CAT_MUNICIPIOS_SEDESEM;
use App\LU_LOCALIDADES_SEDESEM;
use App\CAT_NACIONALIDADES;
use App\CAT_ESTADO_CIVIL;
use App\CAT_ENTIDAD_FEDERATIVA;
use App\CAT_SECCIONES_SEDESEM;
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

class JOVENES_MOVIMIENTO_Controller extends Controller
{
    public function LocalidadMunicipio(Request $request, $id){
        return response()->json(LU_LOCALIDADES_SEDESEM::Localidad($id));
    }

    public function SeccionLocalidad(Request $request, $id){
            return response()->json(CAT_SECCIONES_SEDESEM::Seccion($id));
    }

    public function archivos($correo){
        $usu = FURWEB_CTRL_ACCESO_154::select('FOLIO','LOGIN')->where('LOGIN','like','%'.$correo.'%')->get();
        $usuario = $usu[0];
        $programa = CAT_PROGRAMAS::find(154);
        return view('jovenes-movimiento.carga-archivos.inicio',compact('usuario','programa'));
    }

    public function cargaArchivos(Request $request){
        if($request->file('INE') AND $request->file('COMP_ESTUDIOS')){
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
            } else {$ip = $_SERVER['REMOTE_ADDR'];}
            $ine = $request->file('INE');
            $comp_est = $request->file('COMP_ESTUDIOS');
            //$ine->putFile(public_path().'/documentacion/'.$request->FOLIO.'/','INE_Folio'.$request->FOLIO.'_'.$ine->getClientOriginalName());
            //$comp_est->putFile(public_path().'/documentacion/'.$request->FOLIO.'/','COMP-EST_Folio'.$request->FOLIO.'_'.$comp_est->getClientOriginalName());
            $ine->move(public_path().'/documentacion/'.$request->FOLIO.'/','INE_Folio'.$request->FOLIO.'_'.$ine->getClientOriginalName());
            $comp_est->move(public_path().'/documentacion/'.$request->FOLIO.'/','COMP-EST_Folio'.$request->FOLIO.'_'.$comp_est->getClientOriginalName());
            $nuevo_doctos = new FURWEB_CONTROL_DOCTOS_154();
            $nuevo_doctos->N_PERIODO            = date('Y');
            $nuevo_doctos->CVE_PROGRAMA         = 154;
            $nuevo_doctos->FOLIO                = $request->FOLIO;
            $nuevo_doctos->FOLIO_RELACIONADO    = $request->FOLIO;
            $nuevo_doctos->DOCTO_1              = 'INE_Folio'.$request->FOLIO.'_'.$ine->getClientOriginalName();
            $nuevo_doctos->DOCTO_2              = 'COMP-EST_Folio'.$request->FOLIO.'_'.$comp_est->getClientOriginalName();
            $nuevo_doctos->FECHA_REG            = date('Y/m/d');
            $nuevo_doctos->USU                  = $request->LOGIN;
            $nuevo_doctos->IP                   = $ip;
            $nuevo_doctos->save();
            return redirect()->route('beneficiario.cuenta',$request->LOGIN);
        }
        else{
            return back()->withErrors(['FOLIO' => 'Tus archivos son incompatibles, por favor verificalos.']);
        }
    }

    public function altaInfoPersonal($correo){
        $usu = FURWEB_CTRL_ACCESO_154::select('FOLIO','LOGIN')->where('LOGIN','like','%'.$correo.'%')->get();
        $usuario = $usu[0];
        $programa = CAT_PROGRAMAS::find(154);
        $municipios = CAT_MUNICIPIOS_SEDESEM::select('MUNICIPIOID', 'MUNICIPIONOMBRE')->where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIONOMBRE','asc')->get();
        $nacionalidad = CAT_NACIONALIDADES::all();
        $edo_civil = CAT_ESTADO_CIVIL::all();
        $entidad_fed = CAT_ENTIDAD_FEDERATIVA::all();  
        $redes = CAT_RED_SOCIAL::all(); 
    	return view('jovenes-movimiento.datos-personales.inicio', compact('usuario','programa','municipios','nacionalidad','edo_civil','entidad_fed','redes'));
    }

   	public function capturaInfoPersonal(Request $request){
/***VALIDAR NOMBRES Y APELLIDOS****************************************************************************/
        if(FURWEB_METADATO_154::validaNombres($request->PRIMER_APELLIDO)==false){
            return back()->withInput()->withErrors(['PRIMER_APELLIDO' => 'El PRIMER APELLIDO '.$request->PRIMER_APELLIDO.' contiene caracteres inválidos. Favor de verificar.']);
        }else
            if($request->SEGUNDO_APELLIDO != NULL){
                if(FURWEB_METADATO_154::validaNombres($request->SEGUNDO_APELLIDO)==false){
                    return back()->withInput()->withErrors(['SEGUNDO_APELLIDO' => 'El SEGUNDO APELLIDO '.$request->SEGUNDO_APELLIDO.' contiene caracteres inválidos. Favor de verificar.']);
                }
            }
                if(FURWEB_METADATO_154::validaNombres($request->NOMBRES)==false){
                    return back()->withInput()->withErrors(['NOMBRES' => 'El NOMBRE '.$request->NOMBRES.' contiene caracteres inválidos. Favor de verificar.']);
                }
/***VALIDAR TELEFONO******************************************************************************************/
        if(FURWEB_METADATO_154::validaNumero($request->LADA)==false){
            return back()->withInput()->withErrors(['TELEFONO' => 'El LADA contiene caracteres inválidos. Favor de verificar.']);
        }else{
            if(FURWEB_METADATO_154::validaNumero($request->TELEFONO)==false){
                return back()->withInput()->withErrors(['TELEFONO' => 'El TELÉFONO contiene caracteres inválidos. Favor de verificar.']);
            }
        }
/***VALIDAR CURP******************************************************************************************/
            $curp_aux = FURWEB_METADATO_154::find($request->FOLIO);
            if($curp_aux == NULL){      //QUIERE DECIR QUE NO HAY REGISTRO CON ESE FOLIO (QUE AUN NO ESTA ESA CURP REGISTRADA)
/***VALIDAR EDAD*****************************************************************************************/
                $edad = FURWEB_METADATO_154::ValidaEdad($request->FECHA_NACIMIENTO);
                if($edad == false){
                    return back()->withErrors(['FECHA_NACIMIENTO' => 'La edad del solicitante debe estar entre los 18 y los 29 años.']);
                }else
/***VALIDAR RFC************************************************************************************/
                    if($request->RFC != NULL){
                        $rfc = FURWEB_METADATO_154::ValidaRFC($request->FECHA_NACIMIENTO,$request->CURP,$request->RFC);
                        if($rfc == false)
                            return back()->withInput()->withErrors(['FOLIO' => 'Al parecer el RFC '.$request->RFC.' tiene un error ya que no coincide con los dígitos de la CURP, favor de verificar.']);
                        
                    }
/***VALIDAR DUPLICADOS************************************************************************************/
                    $nombre_comp = $request->PRIMER_APELLIDO.' '.$request->SEGUNDO_APELLIDO.' '.$request->NOMBRES;
                    $duplicado = FURWEB_METADATO_154::ValidaDuplicados($nombre_comp,$request->FECHA_NACIMIENTO,$request->municipio);
                    if($duplicado == false){
                        return back()->withInput()->withErrors(['FOLIO' => 'Este registro ya se encuentra en el sistema.']);
                    }else{
/***VALIDAR FORMATO CURP******************************************************************************************/
                        $vcurp = FURWEB_METADATO_154::ValidaCurp($request->FECHA_NACIMIENTO,$request->CURP,$request->sexo,$request->cve_entidad_federativa);
                        if($vcurp == true){
/***REGISTRA DATOS******************************************************************************************/                            
                            $loc = LU_LOCALIDADES_SEDESEM::where([
                                                            'CVE_ENTIDAD_FEDERATIVA' => $request->cve_entidad_federativa,
                                                            'CVE_LOCALIDAD'          => $request->localidad
                                                            ])->get();

                            $reg = CAT_MUNICIPIOS_SEDESEM::where([
                                                            'ENTIDADFEDERATIVAID' => $request->cve_entidad_federativa,
                                                            'MUNICIPIOID'         => $request->municipio
                                                            ])->get();

                            $fecha_esp  = str_replace("/", "", $request->FECHA_NACIMIENTO);
                            $dia        = substr($fecha_esp, 0, 2);
                            $mes        = substr($fecha_esp, 2, 2);
                            $anio       = substr($fecha_esp, 4, 4);
                            $fecha_ok   = $anio."/".$mes."/".$dia;
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

                            $nuevo_registro = new FURWEB_METADATO_154();
                            $nuevo_registro->N_PERIODO              = date('Y');
                            $nuevo_registro->CVE_PROGRAMA           = 299;
                            $nuevo_registro->FOLIO                  = $request->FOLIO;
                            $nuevo_registro->FOLIO_RELACIONADO      = (string)$request->FOLIO; //CADENA
                            $nuevo_registro->CVE_DEPENDENCIA        = '215D000000';
                            $nuevo_registro->CVE_COORDINACION       = '2153300000';
                            $nuevo_registro->TIPO_BENEFICIARIO      = 'B';
                            $nuevo_registro->PRIMER_APELLIDO        = strtoupper($request->PRIMER_APELLIDO);
                            $nuevo_registro->SEGUNDO_APELLIDO       = strtoupper($request->SEGUNDO_APELLIDO);
                            $nuevo_registro->NOMBRES                = strtoupper($request->NOMBRES);
                            $nuevo_registro->NOMBRE_COMPLETO        = strtoupper($request->PRIMER_APELLIDO.' '.$request->SEGUNDO_APELLIDO.' '.$request->NOMBRES);
                            $nuevo_registro->FECHA_NACIMIENTO       = $fecha_ok;
                            $nuevo_registro->NUMERO_HIJOS           = 0;
                            $nuevo_registro->SEXO                   = strtoupper($request->sexo);
                            $nuevo_registro->TP_ID_OFICIAL          = 0;
                            $nuevo_registro->FOLIO_ID_OFICIAL       = $request->FOLIO_ID_OFICIAL;
                            $nuevo_registro->CVE_ESTADO_CIVIL       = $request->estado_civil;
                            $nuevo_registro->CVE_GRADO_ESTUDIOS     = 0;
                            $nuevo_registro->CVE_PARENTESCO         = 0;
                            $nuevo_registro->CURP                   = strtoupper($request->CURP);
                            $nuevo_registro->RFC                    = strtoupper($request->RFC);
                            $nuevo_registro->CVE_NACIONALIDAD       = $request->nacionalidad;
                            $nuevo_registro->CVE_LUGAR_NACIMIENTO   = $request->cve_entidad_federativa;
                            $nuevo_registro->CVE_ACTIVIDAD_LABORAL  = 0;
                            $nuevo_registro->CALLE                  = strtoupper($request->CALLE);
                            $nuevo_registro->NUM_EXT                = strtoupper($request->NUM_EXT);
                            $nuevo_registro->NUM_INT                = strtoupper($request->NUM_INT);
                            $nuevo_registro->MANZANA                = ' ';
                            $nuevo_registro->LOTE                   = ' ';
                            $nuevo_registro->CODIGO_POSTAL          = $request->CODIGO_POSTAL;
                            $nuevo_registro->SECCION                = $request->seccion;
                            $nuevo_registro->ENTRE_CALLE            = strtoupper($request->ENTRE_CALLE);
                            $nuevo_registro->Y_CALLE                = strtoupper($request->Y_CALLE);
                            $nuevo_registro->OTRA_REFERENCIA        = strtoupper($request->OTRA_REFERENCIA);
                            $nuevo_registro->LADA_TELEFONO          = $request->LADA_TELEFONO;
                            $nuevo_registro->TELEFONO               = $request->TELEFONO;
                            $nuevo_registro->COLONIA                = strtoupper($request->COLONIA);
                            $nuevo_registro->CVE_LOCALIDAD          = $request->localidad;
                            if(!$loc->count())
                                $nuevo_registro->LOCALIDAD          = ' ';
                            else
                                $nuevo_registro->LOCALIDAD          = strtoupper($loc[0]->desc_localidad);//$request->desc_localidad; // SACAR NOMBRE DE LOCALIDAD
                            $nuevo_registro->CVE_MUNICIPIO          = $request->municipio;
                            $nuevo_registro->CVE_ENTIDAD_FEDERATIVA = $request->cve_entidad_federativa;
                            $nuevo_registro->CVE_REGION             = $reg[0]->regionid; // SACAR REGION
                            $nuevo_registro->CORREO_ELECTRONICO     = $request->LOGIN;
                            $nuevo_registro->CVE_RED_SOCIAL         = $request->cve_red_social;
                            $nuevo_registro->RED_SOCIAL             = $request->RED_SOCIAL;
                            $nuevo_registro->STATUS_1               = 'N';
                            $nuevo_registro->STATUS_2               = 'M';
                            $nuevo_registro->USU                    = $request->LOGIN;
                            $nuevo_registro->PW                     = ' ';
                            $nuevo_registro->IP                     = $ip;
                            $nuevo_registro->FECHA_REG              = date('Y/m/d');
                            if($nuevo_registro->save() == true){
                                return redirect()->route('beneficiario.apartado-b',$request->LOGIN);
                            }else{
                                return back()->withInput()->withErrors(['FOLIO' => 'Ha ocurrido un error inesperado.']);
                            }
                        }else{
                            return back()->withInput()->withErrors(['CURP' => 'El CURP '.$request->CURP.' está en un formato incorrecto. Verificar si no fue un error de escritura.']);
                        }
                    }
            }
            else
                if($curp_aux->curp == $request->CURP){
                    return back()->withInput()->withErrors(['CURP' => 'El CURP '.$request->CURP.' está duplicado. Verificar si no hubo un error de escritura.']);
                }else
                    if($curp_aux->curp != NULL){
                        return back()->withInput()->withErrors(['FOLIO' => 'La CURP '.$request->CURP.' ya se encuentra registrada en el sistema. Verificar si no hubo un error de escritura.']);
                }
    }

    public function altaInfoSocio($correo){
        $usu = FURWEB_CTRL_ACCESO_154::select('FOLIO','LOGIN')->where('LOGIN','like','%'.$correo.'%')->get();
        $usuario = $usu[0];
        $dato           = FURWEB_METADATO_154::select('NOMBRES')->where('USU','like','%'.$correo.'%')->get();
        $datos = $dato[0];
        $programa       = CAT_PROGRAMAS::find(154);
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
        $act_lab        = CAT_ACTIVIDAD_LABORAL::orderBy('CVE_ACTIVIDAD_LABORAL','asc')->get();
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
        return view('jovenes-movimiento.datos-socioeconomicos.inicio-socio',compact('usuario','programa','datos','parentesco','lenguas','cantidades','tiempos','enfermedades','discapacidades','instsalud','orfandad','grado_estudios','t_empleo','salarios','dependientes','ingresos','casas','materiales','servicios_a','sandren','servicio_l','combustibles','origenes','act_lab'));
    }

    public function capturaInfoSocio(Request $request){
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
        $nuevo_registro                             = new SEDESEM_154($request->all());
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
        $nuevo_registro->MENOR_ACOSTARHAMBRE        = $request->MENOR_ACOSTOHAMBRE;
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
        $nuevo_registro->BOMBA_AGUA                 = $request->BOMBA_AGUA;
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
        $nuevo_registro->IP                         = $ip;
        $nuevo_registro->FECHA_M                    = date('d/m/Y');
        $nuevo_registro->USU_M                      = $request->LOGIN;
        //dd($nuevo_registro);
        /*if($nuevo_registro->save() == true){
            return redirect()->route('beneficiario.info');
        }else{
            return back()->withInput()->withErrors(['FOLIO' => 'Ha ocurrido un error inesperado.']);
        }*/
        //return redirect()->route('usuario.show',$nuevo_registro->FOLIO);
        $nuevo_registro->save();
        return redirect()->route('beneficiario.info',$request->CVE_ORIGEN);
    }

    public function info($id){
        return view('jovenes-movimiento.registrado');
    }

    public function generarPDF($id){
        $usuario = FURWEB_METADATO_154::find($id);
        $info    = SEDESEM_154::find($id);
        //dd($usuario);
        //$data = ['title' => 'SECRETARÍA DE DESARROLLO SOCIAL'];
        return view('jovenes-movimiento.pdf',compact('usuario','info'));
        //PDF::loadFile(public_path().)->stream();
        //$pdf = PDF::loadView('jovenes-movimiento.pdf',$usuario,$info);
        //return $pdf->download('FUR.pdf');
        //return PDF::loadFile(public_path().'/'.)->stream('download.pdf');
    }
}
