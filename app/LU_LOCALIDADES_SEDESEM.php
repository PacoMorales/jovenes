<?php
/*
Clase modelo: CAT_CASADONDEVIVE_ES
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
Función Localidad() : Es utilizada para obtener todas las localidades pertenecientes a la clave de municipio igual 
                      al parámetro que viene en la función.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_LOCALIDADES_SEDESEM extends Model
{
    protected $table = "LU_LOCALIDADES_SEDESEM";
    protected  $primaryKey = 'CVE_LOCALIDAD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ENTIDAD_FEDERATIVA', 
	    'CVE_MUNICIPIO',
	    'CVE_LOCALIDAD',
	    'DESC_LOCALIDAD'
    ];

    public static function Localidad($id){
        return LU_LOCALIDADES_SEDESEM::where('CVE_MUNICIPIO',$id)
                                    ->orderBy('DESC_LOCALIDAD','asc')
                                    ->get();
    }
}
