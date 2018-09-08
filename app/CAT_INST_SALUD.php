<?php
/*
Clase modelo: CAT_INST_SALUD
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_INST_SALUD extends Model
{
    protected $table = "CAT_INST_SALUD";
    protected  $primaryKey = 'CVE_INST_SALUD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_INST_SALUD', 
	    'DESC_INST_SALUD'
    ];
}
