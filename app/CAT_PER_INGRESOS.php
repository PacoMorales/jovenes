<?php
/*
Clase modelo: CAT_PER_INGRESOS
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_PER_INGRESOS extends Model
{
    protected $table = "CAT_PER_INGRESOS";
    protected  $primaryKey = 'CVE_PER_INGRESO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_PER_INGRESO', 
	    'DESC_PER_INGRESO'
    ];
}
