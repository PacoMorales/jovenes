<?php
/*
Clase control: FURWEB_CTRL_ACCESO_Controller
Descripción: Est clase es la encargada de realizar las acciones (CRUD) correspondientes al login 
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\FURWEB_CTRL_ACCESO;
use App\SEDESEM_299;
use App\FURWEB_METADATO_299;
use App\CAT_PROGRAMAS;

use Laracasts\Flash\Flash;

use App\Http\Requests\FURWEB_CTRL_ACCESO_Request;

class FURWEB_CTRL_ACCESO_Controller extends Controller

{
    public function index(Request $request){
    /*
    Función: index
    Parámetro(s): request
    Valor de (los) parámetro(s): valor numérico correspondiente al folio o de tipo cadena,
                                correspondiente al nombre completo de la persona a buscar
    Parámetro validado por: Clase Request
    Descripción de la función: realiza una busqueda del beneficiario; primero, ´"valida" para saber si 
                                el valor del parámetro es número o si es cadena.
                                De ser numerico, busca por medio del folio
                                De ser cadena, busca por medio del nombre completo
                                Si el valor que regresa la consulta es cero o es vacio, se ejecuta la vista
                                "no-encontrado", mostrando al usuario que el beneficiario buscado no fue encontrado.
                                Si el valor que regresa es distinto de cero, se ejecuta la vista "admin-search",
                                mostrando los datos del beneficiario, al usuario.
    Mandada a llamar por: Botón de búsqueda del módulo de administrador.
    
*/
        $programa       = CAT_PROGRAMAS::find(299);
        $adm            = FURWEB_METADATO_299::find(0);
        $total          = FURWEB_METADATO_299::orderBy('FOLIO','asc');
        $total_usuarios = FURWEB_METADATO_299::orderBy('FOLIO','asc')->paginate(20);
        $cant_total     = $total->count();
        $cant_page      = $total_usuarios->count();
        if(is_numeric($request->FOLIO)){
            $user           = FURWEB_METADATO_299::search($request->FOLIO)->get();
            if(!$user->count()){
                return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));   
            }
            $usuario        = $user[0];
            //dd($usuario);
            $datos          = FURWEB_METADATO_299::find($request->FOLIO);
                if($usuario->login == " " || !$user->count()){
                    return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));   
                }else{
                    return view('usuario.admin.admin-search', compact('usuario','programa','datos','cant_total','adm'));
                }
        }else{
            if(is_string($request->FOLIO)){
                $NOMBRE_COMPLETO = strtoupper($request->FOLIO);
                $user           = FURWEB_METADATO_299::search_name($NOMBRE_COMPLETO)->get();
                $dato           = FURWEB_METADATO_299::where('NOMBRE_COMPLETO',$NOMBRE_COMPLETO)->get();
                    if(!$user->count()){
                        return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));   
                    }else{
                        $usuario = $user[0];
                        $datos   = $dato[0];
                        return view('usuario.admin.admin-search', compact('usuario','programa','datos','cant_total','adm'));
                    }
            }
            else{
                    return view('usuario.admin.no-encontrado', compact('programa','datos','cant_total','adm'));
            }

        }
        
    }

    public function create(){
    /*
    Función: create
    Parámetro(s):
    Valor de (los) parámetro(s):
    Parámetro validado por:
    Descripción de la función: ejecuta la vista "registro"
    Mandada a llamar por: vista "inicio"  
    */
        return view('usuario.registro');
    }

    public function store(FURWEB_CTRL_ACCESO_Request $request){
    /*
    Función: store
    Parámetro(s): request
    Valor de (los) parámetro(s): nuevo objeto de login
    Parámetro validado por: clase FURWEB_CTRL_ACCESO_Request
    Descripción de la función: "valida" si se esta accediendo como administrador, de ser asi, carga el módulo de administrador
                                    si no es administrador, valida si es "super administrador", de serlo, carga la vista de super administrador
                                obtiene el registro con el folio entrante, valida que el folio no sea cero, de ser cero
                                    arroja un error
                                después, valida que este beneficiario no este registrado, de estar registrado manda un error,
                                si no esta registrado, guarda los datos correspondientes al registro.
                                envía el correo electrónico a la cuenta brindada por el beneficiario.
                                realiza una actualizacion de datos
                                carga mensajes para ser mostrados en la siguiente vista
                                ejecuta vista "registro-exitoso", con los datos cargados en una variable llamada "user" 
    Mandada a llamar por: vista "inicio"  
    */
        if(!ctype_digit($request->FOLIO)){
            return back()->withInput()->withErrors(['FOLIO' => 'El FOLIO '.$comp->folio.' contine caracteres inválidos.']);
        }
        if(($request->FOLIO=="0") && ($request->LOGIN=="adminFUR2018@admin.com") && ($request->PASSWORD=="adminFUR2018")){
            Flash::info("Bienvenido Administrador.")->important();
            return redirect()->route('usuario.show',$request->FOLIO);
        }else{
            if($request->FOLIO=="0" && $request->LOGIN=="god@god.god" && $request->PASSWORD=="god666"){
                Flash::info("Bienvenido Administrador GOD.")->important();
                return redirect()->route('usuario.show',$request->FOLIO); 
            }
        }
        //dd('Si no esta ya registrado...');
        $comp = FURWEB_CTRL_ACCESO::find($request->FOLIO);
    	if(($comp->status_1 == "1") || ($comp->login != ' ' && $comp->password != ' ' && $comp->tipo_usuario != ' ')){
            $comp::destroy($comp->FOLIO);
            if($comp->folio=='0'){
                return back()->withInput()->withErrors(['FOLIO' => 'El FOLIO '.$comp->folio.' no puede registrarse. El folio debe ser mayor que cero.']);
            }
            return back()->withInput()->withErrors(['FOLIO' => 'El FOLIO '.$comp->folio.' ya se encuentra registrado.']);
        }
        else{
                $user                   = new FURWEB_CTRL_ACCESO();
                $user->N_PERIODO        = date('Y');
                $user->CVE_PROGRAMA     = 299;
                $user->FOLIO            = $request->FOLIO;
                $user->FOLIO_RELACIONADO= (string)$request->FOLIO;
                $user->CVE_DEPENDENCIA  = '215D000000';
                $user->LOGIN            = $request->LOGIN;
                $user->PASSWORD         = $request->PASSWORD;
                $user->TIPO_USUARIO     = 'PG';
                $user->STATUS_1         = '1';
                $user->STATUS_2         = '1';
                    $fecha_esp          = date('d/m/Y');
                    $dia                = substr($fecha_esp, 0, 2);
                    $mes                = substr($fecha_esp, 3, 2);
                    $anio               = substr($fecha_esp, 8, 4);
                    $fecha_ok           = $anio."/".$mes."/".$dia;
                $user->FECHA_REGISTRO   = $fecha_ok;
                $user_data = [
                                'N_PERIODO'         => $user->N_PERIODO,
                                'CVE_PROGRAMA'      => $user->CVE_PROGRAMA,
                                'FOLIO'             => $user->FOLIO,
                                'FOLIO_RELACIONADO' => $user->FOLIO_RELACIONADO,
                                'CVE_DEPENDENCIA'   => $user->CVE_DEPENDENCIA,
                                'LOGIN'             => $user->LOGIN,
                                'PASSWORD'          => $user->PASSWORD,
                                'TIPO_USUARIO'      => $user->TIPO_USUARIO,
                                'STATUS_1'          => $user->STATUS_1,
                                'STATUS_2'          => $user->STATUS_2,
                                'FECHA_REGISTRO'    => $user->FECHA_REGISTRO

                ];
                //dd('a registrar');
                //Mail::to($request->LOGIN)->send(new EmailConfirmation($user));
                $user_update = FURWEB_CTRL_ACCESO::where('FOLIO',$request->FOLIO)->update($user_data);
                //dd('registro!');
                Flash::success("La información de la cuenta de usuario fue registrada satisfactoriamente. Por favor lee con atención los términos de uso.")->important();
                Flash::info("Folio de tarjeta: ".$user->FOLIO_RELACIONADO.". Tu nombre de usuario o correo electrónico es: ".$user->LOGIN)->important();
                Flash::warning("Estos datos se enviarán en un correo electrónico a la dirección que ingreso.")->important();
                //dd('llama vista');
                return view('usuario.registro-exitoso',compact('user'));
        }
    }

    public function show($id){
    /*
    Función: show
    Parámetro(s): id
    Valor de (los) parámetro(s): valor del folio
    Parámetro validado por:
    Descripción de la función: "valida" que el parámetro sea numérico, de no serlo, ejecuta una vista llamada "error"
                                de ser numérico, valida que no este logeado, si no esta logeado, ejecuta la vista "error"
                                después, obtiene el registro completo en la variable usuario, y sus datos personales 
                                en la variable datos.
                                "valida" si el id es cero, obtiene todos los beneficiarios registrados, la cantidad 
                                total de registros y se muestra la vista "vista administrador", con todos los datos anteriores
                                si el id no es cero, ejecuta la vista "pagina principal" con la variable usuario y datos
    Mandada a llamar por: vista "inicio"  
    */
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
        $programa       = CAT_PROGRAMAS::find(299);
        $datos          = FURWEB_METADATO_299::find($id);
        if($id==0){
            $total          = FURWEB_METADATO_299::orderBy('FOLIO','asc');
            $total_usuarios = FURWEB_METADATO_299::orderBy('FOLIO','asc')->paginate(20);
            $cant_total     = $total->count();
            $cant_page      = $total_usuarios->count();
            return view('usuario.admin.vista-administrador', compact('usuario','programa','datos','total_usuarios','cant_total','cant_page'));
        }
        else{
            return view('usuario.pagina-principal',compact('usuario','programa','datos'));
        }
    }

    public function edit($id){
    /*
    Función: edit
    Parámetro(s): id
    Valor de (los) parámetro(s): valor del folio
    Parámetro validado por:
    Descripción de la función: "valida" que el parámetro sea numérico, de no serlo, ejecuta una vista llamada "error"
                                de ser numérico, valida que no este logeado, si no esta logeado, ejecuta la vista "error"
                                después, obtiene el registro a actualizar, y 'STATUS_2' lo reasigna.
                                ejecuta la vista "registro"
    Mandada a llamar por: vista "inicio"  
    */
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
        
                $user_data = ['STATUS_2'          => ' '];
                $user_update = FURWEB_CTRL_ACCESO::where('FOLIO', $id)->update($user_data);
                return view('usuario.registro');
    }

    public function update(FURWEB_CTRL_ACCESO_Request $request, $id){}

    public function destroy($id){}

    public function adminDelete($id){
    /*
    Función: adminDelete
    Parámetro(s): id
    Valor de (los) parámetro(s): valor del folio
    Parámetro validado por:
    Descripción de la función: se recibe un parametro y se buscan los registros con el mismo valor del parámetro
                                y eliminarlos.
    Mandada a llamar por: módulo administrador 
    */
        //dd('entro');
        $usuario        = FURWEB_CTRL_ACCESO::find($id);
        $dato_personal  = FURWEB_METADATO_299::where('FOLIO',$id)->delete();
        $dato_sociodemo = SEDESEM_299::where('FOLIO',$id)->delete();
        //$dato_personal->delete();
        //$dato_sociodemo->delete();
        $user_data = [
                    'N_PERIODO'         => $usuario->N_PERIODO,
                    'CVE_PROGRAMA'      => $usuario->CVE_PROGRAMA,
                    'FOLIO'             => $usuario->FOLIO,
                    'CVE_DEPENDENCIA'   => ' ',
                    'LOGIN'             => ' ',
                    'PASSWORD'          => ' ',
                    'TIPO_USUARIO'      => ' ',
                    'STATUS_1'          => ' ',
                    'STATUS_2'          => ' ',
                    'FECHA_REGISTRO'    => null

                ];
        $user_update = FURWEB_CTRL_ACCESO::where('FOLIO', $id)->update($user_data);
        return redirect()->route('usuario.show',0);
    }
}