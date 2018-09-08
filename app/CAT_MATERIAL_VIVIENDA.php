<?php
/*
Clase modelo: CAT_MATERIAL_VIVIENDA
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_MATERIAL_VIVIENDA extends Model
{
    protected $table = "CAT_MATERIAL_VIVIENDA";
    protected  $primaryKey = 'CVE_MATERIAL';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_MATERIAL', 
	    'DESC_MATERIAL'
    ];
}
