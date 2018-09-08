<?php 
/*
Clase modelo: FURWEB_CTRL_ACCESO
Descripción: esta clase se creó para poder utilizar los datos de esta tabla.
Función scopeSearch() : Las funciones scope se utilizan para realizan querys especificos; en este caso
                        se realiza la busqueda del registro con un folio en especifico, y el resultado
                        se regresa en la variable query.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConexionOracle\Conexion;

class FURWEB_CTRL_ACCESO extends Model
{
    protected $table = 'FURWEB_CTRL_ACCESO_299';
    protected  $primaryKey = 'FOLIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
      'FOLIO_RELACIONADO',
	    'CVE_DEPENDENCIA',
	    'LOGIN',
	    'PASSWORD',
	    'TIPO_USUARIO',
      'STATUS_1',
      'STATUS_2',
	    'FECHA_REGISTRO'
    ];

    public function scopeSearch($query, $folio){
      return $query->where('FOLIO',$folio);
    }
}
