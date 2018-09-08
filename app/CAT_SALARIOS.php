<?php
/*
Clase modelo: CAT_SALARIOS
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_SALARIOS extends Model
{
    protected $table = "CAT_SALARIOS";
    protected  $primaryKey = 'CVE_SALARIO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SALARIO', 
	    'DESC_SALARIO'
    ];
}
