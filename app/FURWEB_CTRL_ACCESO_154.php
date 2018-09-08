<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_CTRL_ACCESO_154 extends Model
{
    protected $table = 'FURWEB_CTRL_ACCESO_154';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
      'FOLIO_RELACIONADO',
      'AP_PATERNO',
      'AP_MATERNO',
      'NOMBRES',
      'NOMBRE_COMPLETO',
	    'CVE_DEPENDENCIA',
	    'LOGIN',
	    'PASSWORD',
	    'TIPO_USUARIO',
      'STATUS_1',
      'STATUS_2',
	    'FECHA_REGISTRO',
      'IP'
    ];

    public static function validaNombre($apellido,$fecha){
      $apellido_aux = strtoupper($apellido);
      $fecha_esp    = str_replace("/", "", $fecha);
      $dia          = substr($fecha_esp, 0, 2);
      $mes          = substr($fecha_esp, 2, 2);
      $anio         = substr($fecha_esp, 4, 4);
      if(($apellido_aux[0] == 'A' || $apellido_aux[0] == 'B' || $apellido_aux[0] == 'C' || $apellido_aux[0] == 'D') AND ($dia == '01' || $dia == '02') AND ($mes == '09') AND ($anio == '2018')){
          return true;
      }else{
            if(($apellido_aux[0] == 'E' || $apellido_aux[0] == 'F' || $apellido_aux[0] == 'G' || $apellido_aux[0] == 'H') AND ($dia == '03' || $dia == '04') AND ($mes == '09') AND ($anio == '2018')){
                return true;
            }else{
                if(($apellido_aux[0] == 'I' || $apellido_aux[0] == 'J' || $apellido_aux[0] == 'K' || $apellido_aux[0] == 'L') AND ($dia == '05' || $dia == '06' || $dia == '07') AND ($mes == '09') AND ($anio == '2018')){
                    return true;
                }else{
                    if(($apellido_aux[0] == 'M' || $apellido_aux[0] == 'N' || $apellido_aux[0] == 'Ñ' || $apellido_aux[0] == 'O') AND ($dia == '08' || $dia == '09' || $dia == '10') AND ($mes == '09') AND ($anio == '2018')){
                      return true;
                    }else{
                        return false;
                    }
                }
            }
      }
      return false;
    }
}
