<?php
/*
Clase modelo: CAT_PROGRAMAS
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_PROGRAMAS extends Model
{
    protected $table = "CAT_PROGRAMAS";
    protected  $primaryKey = 'CVE_PROGRAMA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_PROGRAMA', 
	    'CVE_DEPENDENCIA',
	    'PROGRAMA'
    ];
}
