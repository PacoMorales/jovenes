<?php
/*
Clase modelo: CAT_GRADO_ESTUDIO
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_GRADO_ESTUDIO extends Model
{
    protected $table = "CAT_GRADO_ESTUDIO";
    protected  $primaryKey = 'CVE_GRADO_ESTUDIOS';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_GRADO_ESTUDIOS', 
	    'GRADO_ESTUDIOS'
    ];
}
