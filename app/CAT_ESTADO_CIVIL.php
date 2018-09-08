<?php
/*
Clase modelo: CAT_ESTADO_CIVIL
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ESTADO_CIVIL extends Model
{
    protected $table = "CAT_ESTADO_CIVIL";
    protected  $primaryKey = 'CVE_ESTADO_CIVIL';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ESTADO_CIVIL', 
	    'ESTADO_CIVIL'
    ];
}
