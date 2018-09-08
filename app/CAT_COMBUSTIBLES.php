<?php
/*
Clase modelo: CAT_COMBUSTIBLES
Descripción: esta clase se creó para poder utilizar los datos de este catálogo.
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_COMBUSTIBLES extends Model
{
    protected $table = "CAT_COMBUSTIBLES";
    protected  $primaryKey = 'CVE_COMBUSTIBLE';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_COMBUSTIBLE', 
	    'DESC_COMBUSTIBLE'
    ];
}
