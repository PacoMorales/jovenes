<?php
/*
Clase modelo: CAT_ORFANDAD
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_ORFANDAD extends Model
{
    protected $table = "CAT_ORFANDAD";
    protected  $primaryKey = 'CVE_ORFANDAD';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_ORFANDAD', 
	    'DESC_ORFANDAD'
    ];
}
