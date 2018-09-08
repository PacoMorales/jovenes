<?php
/*
Clase modelo: CAT_CANTIDADES
Descripción: Esta clase modelo fue utilizada para obtener los datos de la base de datos.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_CANTIDADES extends Model
{
    protected $table = "CAT_CANTIDADES";
    protected  $primaryKey = 'CVE_CANT';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_CANT', 
	    'DESC_CANT'
    ];
}
