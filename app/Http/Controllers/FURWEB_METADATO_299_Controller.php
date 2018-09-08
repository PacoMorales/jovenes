<?php

namespace App\Http\Controllers;

use App\Http\Requests\FURWEB_METADATO_299_Request;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Crypt;

use App\FURWEB_CTRL_ACCESO;
use App\FURWEB_METADATO_299;
use App\SEDESEM_299;
use App\CAT_PROGRAMAS;
use App\CAT_RED_SOCIAL;
use App\CAT_MUNICIPIOS_SEDESEM;
use App\LU_LOCALIDADES_SEDESEM;
use App\CAT_NACIONALIDADES;
use App\CAT_ESTADO_CIVIL;
use App\CAT_ENTIDAD_FEDERATIVA;
use App\CAT_SECCIONES_SEDESEM;  

class FURWEB_METADATO_299_Controller extends Controller
{
    public function LocalidadMunicipio(Request $request, $id){
        //dd('ENTRO A LocalidadMunicipio');
    	/*if($request->ajax()){
            $local = LU_LOCALIDADES_SEDESEM::Localidad($id);
            //dd($local->all());
            //return response()->json($local); 
            //dd($local);
            return json_encode($local);
        }*/

        $local = LU_LOCALIDADES_SEDESEM::Localidad($id);
        return response()->json($local);
        //return json_encode($local);
    }

    public function SeccionLocalidad(Request $request, $id){
        //if($request->ajax()){
            $sec = CAT_SECCIONES_SEDESEM::Seccion($id);
            return response()->json($sec);
        //}
    }

    public function index(){}

    public function create(){}

    public function store(FURWEB_METADATO_299_Request $request){
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
/***VALIDAR NOMBRES Y APELLIDOS****************************************************************************/
        if(FURWEB_METADATO_299::validaNombres($request->PRIMER_APELLIDO)==false){
            return back()->withInput()->withErrors(['PRIMER_APELLIDO' => 'El PRIMER APELLIDO '.$request->PRIMER_APELLIDO.' contiene caracteres inválidos. Favor de verificar.']);
        }else
            if($request->SEGUNDO_APELLIDO != NULL){
                if(FURWEB_METADATO_299::validaNombres($request->SEGUNDO_APELLIDO)==false){
                    return back()->withInput()->withErrors(['SEGUNDO_APELLIDO' => 'El SEGUNDO APELLIDO '.$request->SEGUNDO_APELLIDO.' contiene caracteres inválidos. Favor de verificar.']);
                }
            }
                if(FURWEB_METADATO_299::validaNombres($request->NOMBRES)==false){
                    return back()->withInput()->withErrors(['NOMBRES' => 'El NOMBRE '.$request->NOMBRES.' contiene caracteres inválidos. Favor de verificar.']);
                }
/***VALIDAR TELEFONO******************************************************************************************/
        if(FURWEB_METADATO_299::validaNumero($request->LADA)==false){
            return back()->withInput()->withErrors(['TELEFONO' => 'El LADA contiene caracteres inválidos. Favor de verificar.']);
        }else{
            if(FURWEB_METADATO_299::validaNumero($request->TELEFONO)==false){
                return back()->withInput()->withErrors(['TELEFONO' => 'El TELÉFONO contiene caracteres inválidos. Favor de verificar.']);
            }
        }
/***VALIDAR CURP******************************************************************************************/
            $curp_aux = FURWEB_METADATO_299::find($request->FOLIO);
            if($curp_aux == NULL){      //QUIERE DECIR QUE NO HAY REGISTRO CON ESE FOLIO (QUE AUN NO ESTA ESA CURP REGISTRADA)
/***VALIDAR EDAD*****************************************************************************************/
                $edad = FURWEB_METADATO_299::ValidaEdad($request->FECHA_NACIMIENTO);
                if($edad == false){
                    return back()->withErrors(['FECHA_NACIMIENTO' => 'La edad del solicitante debe estar entre los 12 y los 29 años.']);
                }else
/***VALIDAR RFC************************************************************************************/
                    if($request->RFC != NULL){
                        $rfc = FURWEB_METADATO_299::ValidaRFC($request->FECHA_NACIMIENTO,$request->CURP,$request->RFC);
                        if($rfc == false)
                            return back()->withInput()->withErrors(['FOLIO' => 'Al parecer el RFC '.$request->RFC.' tiene un error ya que no coincide con los dígitos de la CURP, favor de verificar.']);
                        
                    }
/***VALIDAR DUPLICADOS************************************************************************************/
                    $nombre_comp = $request->PRIMER_APELLIDO.' '.$request->SEGUNDO_APELLIDO.' '.$request->NOMBRES;
                    $duplicado = FURWEB_METADATO_299::ValidaDuplicados($nombre_comp,$request->FECHA_NACIMIENTO,$request->municipio);
                    if($duplicado == false){
                        return back()->withInput()->withErrors(['FOLIO' => 'Este registro ya se encuentra en el sistema.']);
                    }else{
/***VALIDAR FORMATO CURP******************************************************************************************/
                        $vcurp = FURWEB_METADATO_299::ValidaCurp($request->FECHA_NACIMIENTO,$request->CURP,$request->sexo,$request->cve_entidad_federativa);
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

                            $nuevo_registro = new FURWEB_METADATO_299();
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
                            $nuevo_registro->IP                     = ' ';
                            $nuevo_registro->FECHA_REG              = date('Y/m/d');
                            $nuevo_registro->save();
                            //Flash::info("Los siguientes datos son de menor importancia pero son de gran utilidad para generar infomación estadística.")->important();
                            //Flash::warning("Si lo desea, puedes dar clic en el boton TERMINAR sin realizar ningún cambio.")->important();
/***************ENTRA A LA ÚTIMA PANTALLA!!!******************************************************************************************************************************************/
                            $user_data = ['STATUS_2' => ' '];
                            FURWEB_CTRL_ACCESO::where('FOLIO', $request->folio)->update($user_data);
                            Flash::success("La información fue registrada satisfactoriamente.")->important();
                            return redirect()->route('usuario.ok');
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

    public function nuevoRegistroJEM(){ //nuevo registro jovenes en movimiento
        return view('usuario.terminado');
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
            //dd($id);
        $usuario = FURWEB_CTRL_ACCESO::find($id);
        $programa = CAT_PROGRAMAS::find(299);
        $municipios = CAT_MUNICIPIOS_SEDESEM::select('MUNICIPIOID', 'MUNICIPIONOMBRE')->where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIONOMBRE','asc')->get();
        $nacionalidad = CAT_NACIONALIDADES::all();
        $edo_civil = CAT_ESTADO_CIVIL::all();
        $entidad_fed = CAT_ENTIDAD_FEDERATIVA::all();  
        $redes = CAT_RED_SOCIAL::all();          
        return view('apartado-a.inicio', compact('usuario','programa','municipios','nacionalidad','edo_civil','entidad_fed','redes'));
    }

    public function edit($id){
        //dd('info personal editar');
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
        $programa       = CAT_PROGRAMAS::find(299);
        $ent_fed        = 15;
        $municipios     = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',$ent_fed)->orderBy('MUNICIPIONOMBRE','asc')->get();
        $nacionalidad   = CAT_NACIONALIDADES::all();
        $edo_civil      = CAT_ESTADO_CIVIL::all();
        $entidad_fed    = CAT_ENTIDAD_FEDERATIVA::all();
        $redes = CAT_RED_SOCIAL::all();
        return view('apartado-a.editar', compact('usuario','datos','programa','municipios','nacionalidad','edo_civil','entidad_fed','redes'));
    }

    public function update(FURWEB_METADATO_299_Request $request, $id){
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

        $fecha_esp  = str_replace("/", "", $request->FECHA_NACIMIENTO);
        $dia        = substr($fecha_esp, 0, 2);
        $mes        = substr($fecha_esp, 2, 2);
        $anio       = substr($fecha_esp, 4, 4);
        $fecha_ok   = $anio."/".$mes."/".$dia;
/***VALIDAR CURP******************************************************************************************/
            $curp_aux = FURWEB_METADATO_299::find($request->FOLIO);
            if($curp_aux == NULL || ($curp_aux->curp == $request->CURP) || ($curp_aux->folio == $request->FOLIO)){      //QUIERE DECIR QUE NO HAY REGISTRO CON ESE FOLIO (QUE AUN NO ESTA ESA CURP REGISTRADA)
/***VALIDAR EDAD*****************************************************************************************/
                $edad = FURWEB_METADATO_299::ValidaEdad($request->FECHA_NACIMIENTO);
                if($edad == false){
                    return back()->withErrors(['FECHA_NACIMIENTO' => 'La edad del solicitante debe estar entre los 12 y los 29 años.']);
                }else{
/***VALIDAR FORMATO CURP******************************************************************************************/
                        $vcurp = FURWEB_METADATO_299::ValidaCurp($request->FECHA_NACIMIENTO,$request->CURP,$request->sexo,$request->cve_entidad_federativa);
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
                            $nuevo_registro = [
                                                'N_PERIODO'              => date('Y'),
                                                'CVE_PROGRAMA'           => 299,
                                                'FOLIO'                  => $request->FOLIO,
                                                'FOLIO_RELACIONADO'      => $request->FOLIO,
                                                'CVE_DEPENDENCIA'        => '215D000000',
                                                'CVE_COORDINACION'       => '2153300000',
                                                'TIPO_BENEFICIARIO'      => 'B',
                                                'PRIMER_APELLIDO'        => strtoupper($request->PRIMER_APELLIDO),
                                                'SEGUNDO_APELLIDO'       => strtoupper($request->SEGUNDO_APELLIDO),
                                                'NOMBRES'                => strtoupper($request->NOMBRES),
                                                'NOMBRE_COMPLETO'        => $request->PRIMER_APELLIDO.' '.$request->SEGUNDO_APELLIDO.' '.$request->NOMBRES,
                                                'FECHA_NACIMIENTO'       => $fecha_ok,
                                                'NUMERO_HIJOS'           => 0,
                                                'SEXO'                   => strtoupper($request->sexo),
                                                'TP_ID_OFICIAL'          => 0,
                                                'FOLIO_ID_OFICIAL'       => $request->FOLIO_ID_OFICIAL,
                                                'CVE_ESTADO_CIVIL'       => $request->estado_civil,
                                                'CVE_GRADO_ESTUDIOS'     => 0,
                                                'CVE_PARENTESCO'         => 0,
                                                'CURP'                   => strtoupper($request->CURP),
                                                'RFC'                    => strtoupper($request->RFC),
                                                'CVE_NACIONALIDAD'       => $request->nacionalidad,
                                                'CVE_LUGAR_NACIMIENTO'   => $request->cve_entidad_federativa,
                                                'CVE_ACTIVIDAD_LABORAL'  => 0,
                                                'CALLE'                  => strtoupper($request->CALLE),
                                                'NUM_EXT'                => strtoupper($request->NUM_EXT),
                                                'NUM_INT'                => strtoupper($request->NUM_INT),
                                                'MANZANA'                => ' ',
                                                'LOTE'                   => ' ',
                                                'CODIGO_POSTAL'          => $request->CODIGO_POSTAL,
                                                'SECCION'                => $request->seccion,
                                                'ENTRE_CALLE'            => strtoupper($request->ENTRE_CALLE),
                                                'Y_CALLE'                => strtoupper($request->Y_CALLE),
                                                'OTRA_REFERENCIA'        => strtoupper($request->OTRA_REFERENCIA),
                                                'LADA_TELEFONO'          => $request->LADA_TELEFONO,
                                                'TELEFONO'               => $request->TELEFONO,
                                                'COLONIA'                => strtoupper($request->COLONIA),
                                                'CVE_LOCALIDAD'          => $request->localidad,
                                                'LOCALIDAD'              => strtoupper($loc[0]->desc_localidad),//$request->desc_localidad; // SACAR NOMBRE DE LOCALIDAD
                                                'CVE_MUNICIPIO'          => $request->municipio,
                                                'CVE_ENTIDAD_FEDERATIVA' => $request->cve_entidad_federativa,
                                                'CVE_REGION'             => $reg[0]->regionid, // SACAR REGION
                                                'CORREO_ELECTRONICO'     => $request->LOGIN,
                                                'CVE_RED_SOCIAL'         => $request->cve_red_social,
                                                'RED_SOCIAL'             => $request->RED_SOCIAL,
                                                'STATUS_1'               => 'N',
                                                'STATUS_2'               => 'M',
                                                'USU'                    => $request->LOGIN,
                                                'PW'                     => ' ',
                                                'FECHA_REG'              => date('Y/m/d')
                            ];
                            $nuevo = FURWEB_METADATO_299::where('FOLIO',$request->FOLIO)->update($nuevo_registro);
                            Flash::success("La información fue actualizada satisfactoriamente.")->important();
                            Flash::info("Toda la información obtenida es confidencial.")->important();
                            return redirect()->route('usuario.show',$request->FOLIO);
                        }else{
                            return back()->withErrors(['CURP' => 'El CURP está en un formato incorrecto. Verificar.']);
                        }
                    }
            }
            else
                if($curp_aux->curp <> $request->CURP){
                    return back()->withErrors(['FOLIO' => 'Este registro ya se encuentra en la base de datos.']);
                }
    }

    public function destroy($id){}
}
