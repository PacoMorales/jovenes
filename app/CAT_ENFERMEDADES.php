<?php
/*
Clase modelo: CAT_ENFERMEDADES
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ENFERMEDADES extends Model
{
    protected $table = "CAT_ENFERMEDADES";
    protected  $primaryKey = 'CVE_ENFERMEDAD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ENFERMEDAD', 
	    'DESC_ENFERMEDAD'
    ];
}
