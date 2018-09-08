<?php
/*
Clase modelo: CAT_SECCIONES_SEDESEM
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
Función Seccion() : Es utilizada para obtener todas las secciones pertenecientes al municipio con el id igual 
                    al parámetro que viene en la función.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SECCIONES_SEDESEM extends Model
{
    protected $table = "CAT_SECCIONES_SEDESEM";
    protected  $primaryKey = 'MUNICIPIO_ID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'MUNICIPIO_ID', 
	    'MUNICIPIO',
	    'SECCION'
    ];

    public static function Seccion($id){
        return CAT_SECCIONES_SEDESEM::where('MUNICIPIO_ID',$id)
                                    ->orderBy('SECCION','asc')
                                    ->get();
    }
}
