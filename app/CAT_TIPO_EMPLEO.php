<?php
/*
Clase modelo: CAT_TIPO_EMPLEO
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_TIPO_EMPLEO extends Model
{
    protected $table = "CAT_TIPO_EMPLEO";
    protected  $primaryKey = 'CVE_TIPO_EMPLEO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_TIPO_EMPLEO', 
	    'DESC_TIPO_EMPLEO'
    ];
}
