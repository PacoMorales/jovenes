<?php
/*
Clase modelo: CAT_SERVICIO_AGUA
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SERVICIO_AGUA extends Model
{
    protected $table = "CAT_SERVICIO_AGUA";
    protected  $primaryKey = 'CVE_SERVICIO_AGUA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SERVICIO_AGUA', 
	    'DESC_SERVICIO_AGUA'
    ];
}
