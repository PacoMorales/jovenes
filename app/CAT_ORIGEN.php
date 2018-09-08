<?php
/*
Clase modelo: CAT_ORIGEN
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ORIGEN extends Model
{
    protected $table = "CAT_ORIGEN";
    protected  $primaryKey = 'CVE_ORIGEN';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ORIGEN', 
	    'DESC_ORIGEN'
    ];
}
