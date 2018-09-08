<?php
/*
Clase modelo: CAT_TIEMPO_RADICAR
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_TIEMPO_RADICAR extends Model
{
    protected $table = "CAT_TIEMPO_RADICAR";
    protected  $primaryKey = 'CVE_TIEMPO_RADICAR';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_TIEMPO_RADICAR', 
	    'DESC_TIEMPO_RADICAR'
    ];
}
